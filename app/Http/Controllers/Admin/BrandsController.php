<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Brand $brands)
    {
        if ($request->ajax()) {
            $brands = $brands->orderBy('id', 'DESC');

            // Category Filter
            if ($request->has('category') && !empty($request->category)) {
                $brands->whereHas('category', function ($query) use ($request) {
                    $query->where('id', $request->category);
                });
            }

            return DataTables::eloquent($brands)
                ->editColumn('name', function ($brand) {
                    return $brand->name;
                })
                ->editColumn('image', function ($brand) {
                    if ($brand->image) {
                        return '<img src="' . asset("storage/" . $brand->image) . '" width="50" class="img-thumbnail">';
                    }
                    return '<img src="' . asset("images/Default_image.jpg") . '" width="50" class="img-thumbnail">'; // Default image
                })
                ->addColumn('action', function ($brand) {
                    return '<div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a href="javascript:;" class="dropdown-item fill_data" data-url="' . route('admin.brands.edit', $brand->id) . '" data-method="GET">
                                <i class="dw dw-edit2"></i> Edit
                            </a>
                            <a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.brands.destroy', $brand->id) . '" data-method="DELETE">
                                <i class="dw dw-delete-3"></i> Delete
                            </a>
                        </div>
                    </div>';
                })
                ->rawColumns(["image", "action"]) // Mark image as raw HTML
                ->make(true);
        } else {
            $categories = Category::all(); // Fetch categories for the filter dropdown
            return view('admin.brands.index', compact('categories'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view()->make('admin.brands.add', compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048', // Allow images up to 2MB
        ];

        $messages = [
            'name.required' => 'Please enter brand name.',
            'category_id.required' => 'Please select a category.',
            'image.image' => 'Only image files are allowed.',
            'image.mimes' => 'Allowed formats: JPG, PNG, GIF, WEBP.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $brand = new Brand;
            $brand->category_id = $request->get('category_id');
            $brand->name = $request->get('name');

            // Check if an image is uploaded
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('public/brands', $fileName); // Store file in brands folder

                $brand->image = str_replace('public/', '', $filePath); // Store relative path
            }

            $brand->save();

            return response()->json([
                'success' => true,
                'message' => 'Brand created successfully.',
                'data' => $brand
            ], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, please try again later."], 500);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view()->make('admin.brands.show', compact('brand'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view()->make('admin.brands.edit', compact('brand'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048', // Image max 2MB
        ];

        $messages = [
            'name.required' => 'Please enter brand name.',
            'category_id.required' => 'Please select a category.',
            'image.image' => 'Only image files are allowed.',
            'image.mimes' => 'Allowed formats: JPG, PNG, GIF, WEBP.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $brand->name = $request->get('name');
            $brand->category_id = $request->get('category_id');

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($brand->image && \Storage::exists('public/' . $brand->image)) {
                    \Storage::delete('public/' . $brand->image);
                }

                // Store the new image
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('public/brands', $fileName);

                $brand->image = str_replace('public/', '', $filePath); // Store relative path
            }

            $brand->save();

            return response()->json([
                'success' => true,
                'message' => 'Brand updated successfully.',
                'data' => $brand
            ], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, please try again later."], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            return response()->json(['success', 'Brand deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
