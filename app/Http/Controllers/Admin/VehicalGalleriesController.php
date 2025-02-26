<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehical;
use App\Models\VehicalGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class VehicalGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $vehical_id)
    {
        if ($request->ajax()) {
            $photos = VehicalGallery::where('vehical_id', $vehical_id)->orderBy('id', 'ASC');
            return DataTables::eloquent($photos)
                ->editColumn('file', function ($photo) {
                    return '<img src="' . $photo->file_url() . '">';
                })
                ->editColumn('file_type', function ($photo) {
                    return $photo->file_type;
                })
                ->editColumn('is_featured', function ($photo) {
                    $status = $photo->is_featured ? "True" : 'False';
                    return $status;
                })
                ->addColumn('action', function (VehicalGallery $photo) {
                    $editBtn = '<div class="dropdown"><a class="btn btn-user font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';
                    $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.vehical.galleries.update', [$photo->vehical_id, $photo->id]) . '" data-method="patch"><i class="dw dw-edit2"></i> Make Featured</a>';
                    $editBtn .= '<a href="javascript:;" class="dropdown-item btn-delete" data-url="' . route('admin.vehical.galleries.destroy', [$photo->vehical_id, $photo->id]) . '" data-method="delete"><i class="dw dw-delete-3"></i> Delete</a></div>';
                    return $editBtn;
                })
                ->rawColumns(["file", "action"])
                ->make(true);
        } else {
            return view()->make('admin.vehicals.galleries', compact('vehical_id'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vehical_id)
    {
        Log::info('Image Upload Request Received', [
            'vehical_id' => $vehical_id,
            'request_data' => $request->all(),
        ]);

        $rules = [
            'files' => 'required|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,webp|max:2048' // Allow only images up to 2MB
        ];

        $messages = [
            'files.required' => 'Please select files.',
            'files.*.mimes' => 'Only JPG, PNG, GIF, and WEBP files are allowed.',
            'files.*.max' => 'Each file must not exceed 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            Log::error('Validation Failed', [
                'errors' => $validator->errors()
            ]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $vehical = Vehical::findOrFail($vehical_id); // Ensure vehical exists

            // Generate folder name using ID or slug (fallback to ID if slug is empty)
            $folderName = !empty($vehical->slug) ? $vehical->slug : $vehical_id;
            $storagePath = "public/gallery/{$folderName}"; // Folder per vehicle

            $uploadedFiles = [];

            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs($storagePath, $fileName); // Store file in custom folder

                $photo = new VehicalGallery();
                $photo->vehical_id = $vehical_id;
                $photo->file = str_replace('public/', '', $filePath); // Remove "public/" for proper URL
                $photo->file_type = $file->getMimeType();
                $photo->save();

                $uploadedFiles[] = Storage::url($photo->file);
            }

            Log::info('Images Uploaded Successfully', [
                'vehical_id' => $vehical_id,
                'uploaded_files' => $uploadedFiles
            ]);

            return response()->json([
                'success' => true,
                'message' => 'VehicalGallery created successfully.',
                'files' => $uploadedFiles
            ], 200);
        } catch (\Exception $e) {
            Log::error('Image Upload Error', [
                'error_message' => $e->getMessage()
            ]);
            return response()->json(["error" => "Something went wrong, please try again later."], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vehical_id, $id)
    {
        try {
            $phots = VehicalGallery::where('vehical_id', $vehical_id)->update(['is_featured' => false]);
            $photo = VehicalGallery::find($id);
            $photo->is_featured = true;
            $photo->save();
            return response()->json(['success', 'VehicalGallery updated successfully.'], 200);
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
    public function destroy($vehical_id, $id)
    {
        try {
            $photo = VehicalGallery::find($id);
            $photo->delete();
            return response()->json(['success', 'VehicalGallery deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }
}
