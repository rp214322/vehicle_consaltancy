<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vehical;
use App\Models\Brand;
use App\Models\VehicalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class VehicalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Vehical $vehicals)
    {
        if ($request->ajax()) {
            $vehicals = $vehicals->with(['category', 'brand', 'vehical_model'])
                ->select('vehicals.*') // Prevent ambiguity
                ->orderBy('vehicals.id', 'DESC');

            // Category Filter
            if ($request->has('category') && !empty($request->category)) {
                $vehicals->whereHas('category', function ($query) use ($request) {
                    $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->category) . '%']);
                });
            }

            // Fuel Filter
            if ($request->filled('fuel')) {
                $vehicals->where('fuel', $request->fuel);
            }
            
            // Status Filter - Convert to integer (0 or 1)
            if ($request->filled('status')) {
                $statusValue = $request->status === 'Sold' ? 1 : 0; // Convert "Sold" to 1, "UnSold" to 0
                $vehicals->where('status', $statusValue);
            }

            return DataTables::eloquent($vehicals)
                ->editColumn('category', function ($vehical) {
                    return optional($vehical->category)->name ?? 'N/A';
                })
                ->editColumn('brand', function ($vehical) {
                    return optional($vehical->brand)->name . " - " . optional($vehical->vehical_model)->name;
                })
                ->editColumn('title', function ($vehical) {
                    return e($vehical->title) . "<br><strong>Fuel:</strong> " . e($vehical->fuel) .
                        "<br><strong>Color:</strong> " . e($vehical->color) .
                        "<br><strong>Mileage:</strong> " . e($vehical->mileage);
                })
                ->editColumn('price', function ($vehical) {
                    return number_format($vehical->price, 2);
                })
                ->editColumn('status', function ($vehical) {
                    $status = $vehical->status ? '<span class="badge badge-success">Sold</span>' : '<span class="badge badge-secondary">UnSold</span>';
                    $status .= ' <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Change Status
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $vehical->id . '" data-status="1">Sold</a>
                    <a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $vehical->id . '" data-status="0">UnSold</a>
                    </div>
                </div>';
                    return $status;
                })
                ->addColumn('action', function (Vehical $vehical) {
                    return '<div class="dropdown">
                    <a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="' . route('admin.vehical.galleries.index', $vehical->id) . '">
                            <i class="dw dw-image"></i> Gallery
                        </a>
                        <a href="javascript:;" class="dropdown-item fill_data"
                            data-url="' . route('admin.vehicals.edit', $vehical->id) . '"
                            data-method="get">
                            <i class="dw dw-edit2"></i> Edit
                        </a>
                        <a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.vehicals.destroy', $vehical->id) . '" data-method="delete">
                                <i class="dw dw-delete-3"></i> Delete
                            </a>
                    </div>
                </div>';
                })
                ->rawColumns(["title", "status", "action"])
                ->make(true);
        } else {
            $categories = Category::all();
            return view('admin.vehicals.index', compact('categories'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view()->make('admin.vehicals.add', compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'category_id' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'title' => 'required',
            'year' => 'required',
            'fuel' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'price' => 'required'
        );
        $messages = [
            'category_id.required' => 'Please select brand.',
            'brand_id.required' => 'Please select brand.',
            'model_id.required' => 'Please select model.',
            'year.required' => 'Please select year.',
            'fuel.required' => 'Please select fuel type.',
            'title.required' => 'Please enter title.',
            'color.required' => 'Please enter color.',
            'mileage.required' => 'Please enter mileage.',
            'price.required' => 'Please enter price.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try {
            $vehical = new Vehical();
            $vehical->category_id = $request->get('category_id');
            $vehical->brand_id = $request->get('brand_id');
            $vehical->model_id = $request->get('model_id');
            $vehical->year = $request->get('year');
            $vehical->title = $request->get('title');
            $vehical->fuel = $request->get('fuel');
            $vehical->color = $request->get('color');
            $vehical->mileage = $request->get('mileage');
            $vehical->price = $request->get('price');
            $vehical->technical = $request->get('technical');
            $vehical->feature_option = $request->get('feature_option');
            $vehical->save();
            return response()->json(['success', 'Vehical created successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehical $vehical)
    {
        return view()->make('admin.vehicals.show', compact('vehical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehical = Vehical::find($id);
        return view()->make('admin.vehicals.edit', compact('vehical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'category_id' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'title' => 'required',
            'year' => 'required',
            'fuel' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'price' => 'required'
        );
        $messages = [
            'category_id.required' => 'Please select brand.',
            'brand_id.required' => 'Please select brand.',
            'model_id.required' => 'Please select model.',
            'year.required' => 'Please select year.',
            'fuel.required' => 'Please select fuel type.',
            'title.required' => 'Please enter title.',
            'color.required' => 'Please enter color.',
            'mileage.required' => 'Please enter mileage.',
            'price.required' => 'Please enter price.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try {
            $vehical = Vehical::find($id);
            $vehical->category_id = $request->get('category_id');
            $vehical->brand_id = $request->get('brand_id');
            $vehical->model_id = $request->get('model_id');
            $vehical->year = $request->get('year');
            $vehical->title = $request->get('title');
            $vehical->fuel = $request->get('fuel');
            $vehical->color = $request->get('color');
            $vehical->mileage = $request->get('mileage');
            $vehical->price = $request->get('price');
            $vehical->technical = $request->get('technical');
            $vehical->feature_option = $request->get('feature_option');
            $vehical->save();
            return response()->json(['success', 'Vehical updated successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vehical = Vehical::find($id);
            $vehical->delete();
            return response()->json(['success', 'Vehical deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        try {
            $vehical = Vehical::find($request->id);
            $vehical->status = $request->get('status');
            $vehical->save();
            return response()->json(['success', 'Vehical Status updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    /**
     * Fetch the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $option = '<option value="">Select</option>';

        if ($request->has('id') && $request->has('type')) {
            $data = [];

            if ($request->type == "brand") {
                $data = Brand::where('category_id', $request->id)->get(['id', 'name']);
            } elseif ($request->type == "model") {
                $data = VehicalModel::where('brand_id', $request->id)->get(['id', 'name']);
            }

            foreach ($data as $item) {
                $slug = Str::slug($item->name); // Generate slug from name
                $option .= '<option value="' . $item->id . '" data-slug="' . $slug . '">' . $item->name . '</option>';
            }
        }

        return response()->json($option);
    }
}
