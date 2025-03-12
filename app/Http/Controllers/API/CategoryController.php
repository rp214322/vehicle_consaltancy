<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\AdminInquiryMail;
use App\Mail\UserInquiryMail;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();

        return response()->json([
            'message' => 'Categories fetch successfully',
            'data' => $categories
        ], 200);
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
