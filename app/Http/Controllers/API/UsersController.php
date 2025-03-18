<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\AdminInquiryMail;
use App\Mail\UserInquiryMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Vehical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function vehicleDetails(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        $vehicals = Vehical::with(['brand', 'vehical_model', 'category', 'gallery'])
            ->orderBy('created_at', 'desc') // Order by latest first
            ->paginate($perPage);

        $response = $vehicals->map(function ($vehical) {
            return $this->formatVehicalResponse($vehical);
        });

        return response()->json([
            'success' => true,
            'data' => $response,
            'pagination' => [
                'current_page' => $vehicals->currentPage(),
                'total_pages' => $vehicals->lastPage(),
                'per_page' => $vehicals->perPage(),
                'total_items' => $vehicals->total(),
                'next_page_url' => $vehicals->nextPageUrl(),
                'prev_page_url' => $vehicals->previousPageUrl()
            ]
        ]);
    }

    /**
     * Get a specific vehicle with brand, model, category, and gallery.
     */
    public function showVehicle($identifier)
    {
        $vehical = Vehical::with(['brand', 'vehical_model', 'category', 'gallery'])
            ->where('id', $identifier) // Check by ID
            ->orWhere('slug', $identifier) // Check by Slug
            ->first();

        if (!$vehical) {
            return response()->json([
                'success' => false,
                'error' => 'Vehicle not found'
            ], 404); // 404 Not Found
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatVehicalResponse($vehical)
        ], 200); // 200 OK
    }

    /**
     * Format the vehicle response.
     */
    private function formatVehicalResponse($vehical)
    {
        return [
            'id' => $vehical->id,
            'slug' => $vehical->slug,
            'title' => $vehical->title,
            'year' => $vehical->year,
            'fuel' => $vehical->fuel,
            'color' => $vehical->color,
            'price' => $vehical->price,
            'technical' => $vehical->technical,
            'feature_option' => $vehical->feature_option,
            'status' => $vehical->status,
            'brand' => [
                'id' => $vehical->brand->id ?? null,
                'name' => $vehical->brand->name ?? null,
                'image' => $vehical->brand->image ? asset('storage/' . $vehical->brand->image) : null,
            ],
            'model' => [
                'id' => $vehical->vehical_model->id ?? null,
                'name' => $vehical->vehical_model->name ?? null,
            ],
            'category' => [
                'id' => $vehical->category->id ?? null,
                'name' => $vehical->category->name ?? null,
            ],
            'gallery' => $vehical->gallery->map(function ($image) {
                return [
                    'url' => asset('storage/' . $image->file), // Generates full URL
                    'is_featured' => $image->is_featured, // Include featured status
                ];
            })
        ];
    }
    public function storeInquiry(Request $request)
    {
        // Validate request using Validator
        $validator = Validator::make($request->all(), [
            'vehical_id' => 'nullable|exists:vehicals,id',
            'type' => 'nullable|in:buy,sell',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }

        // Store inquiry in database
        $inquiry = Inquiry::create($validator->validated());

        // Fetch all admin emails
        $adminEmails = User::where('role', 'admin')->pluck('email')->toArray();

        if (!empty($adminEmails)) {
            // Send email to all admins
            Mail::to($adminEmails)->send(new AdminInquiryMail($inquiry));
        }

        // Send email to user
        Mail::to($request->email)->send(new UserInquiryMail($inquiry));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your inquiry. We will contact you soon.',
        ], 200);
    }
}
