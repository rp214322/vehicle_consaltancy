<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Feedback $feedback)
    {
        if ($request->ajax()) {
            $feedback = $feedback->with(['user'])->orderBy('id', 'DESC');
            return Datatables::eloquent($feedback)
                ->filterColumn('status', function ($query, $keyword) {
                    if (strtolower($keyword) === 'active') {
                        $query->where('status', 1);
                    } elseif (strtolower($keyword) === 'inactive' || strtolower($keyword) === 'inactive') {
                        $query->where('status', 0);
                    }
                })
                ->editColumn('user', function ($inquiry) {
                    return $inquiry->user->first_name;
                })
                ->editColumn('rating', function ($feedback) {
                    return $feedback->rating;
                })
                ->addColumn('status', function ($feedback) {
                    $statusText = $feedback->status == 1 ? 'Active' : 'Inactive';
                    $statusClass = $feedback->status == 1 ? 'badge-success' : 'badge-secondary';

                    $status = '<span class="badge ' . $statusClass . '">' . $statusText . '</span>';
                    $status .= ' <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change Status
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $feedback->id . '" data-status="1">Active</a>
                                        <a href="javascript:void(0);" class="dropdown-item change_status" data-id="' . $feedback->id . '" data-status="0">Inactive</a>
                                    </div>
                                </div>';
                    return $status;
                })
                ->addColumn('action', function (Feedback $feedback) {
                    $actionBtn = '<a href="javascript:;" class="btn btn-user fill_data" data-url="' . route('admin.feedbacks.edit', $feedback->id) . '" data-method="get" title="View">
                                    <i class="dw dw-eye font-24"></i>
                                  </a>';
                    return $actionBtn;
                })
                ->rawColumns(["status", "action"])
                ->make(true);
        } else {
            return view()->make('admin.feedbacks.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return view()->make('admin.feedbacks.add',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$rules = array(
            'rating' => 'required',
            'description' => 'required',

            );
        $messages = [
            'rating.required' => 'Please give rating.',
            'description.required' => 'Please write your experience.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try{
            $feedback=New Feedback;
            $feedback->title=$request->get('title');
            $feedback->description=$request->get('description');
            $feedback->save();
            return response()->json(['success','feedback created successfully.'], 200);
        }
        catch(\Exception $e)
        {
          return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view()->make('admin.feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $rules = array(
            'status' => 'required'

        );
        $messages = [
            'status.required' => 'Please give Inquiry Status'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        try {
            $feedback->status = $request->get('status');

            $feedback->save();
            return response()->json(['success', 'feedback update successfully.'], 200);
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
            $feedback = Feedback::find($id);
            $feedback->delete();
            return response()->json(['success', 'feedback deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
    public function updateStatus(Request $request)
    {
        try {
            $feedback = Feedback::find($request->id);
            $feedback->status = $request->get('status');
            $feedback->save();
            return response()->json(['success', 'Feedback Status updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
