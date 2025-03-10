<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'required|numeric|digits:10|unique:users|regex:/^[0-9]{10}$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $response = [
            'message' => 'User registered successfully',
            'data' => $user
        ];

        return response()->json($response, 201);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->has('email')) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json(['message' => 'Email not found. Please first register.'], 404);
            }
        } elseif ($request->has('phone')) {
            $user = User::where('phone', $request->phone)->first();
            if (!$user) {
                return response()->json(['message' => 'Phone number not found. Please first register.'], 404);
            }
        } else {
            return response()->json(['message' => 'Email or phone is required'], 422);
        }

        if ($user->status == 0) {
            return response()->json(['message' => 'You are inactive. Contact admin.'], 403);
        }

        if (!Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Password incorrect'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = [
            'message' => 'Logged in successfully',
            'token' => $token,
            'data' => $user,
        ];

        return response()->json($response);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validation Rules
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'country' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'dob' => 'nullable|date|before:today',
            'image' => 'nullable|string', // Base64 encoded image
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($request->has('image')) {
            $imageData = $request->image;
            $extension = 'png'; // Default extension (use PNG if not found)
            
            // Check if the base64 string contains the prefix
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches)) {
                $extension = $matches[1]; // Extract extension (png, jpg, jpeg, etc.)
                $imageData = substr($imageData, strpos($imageData, ',') + 1); // Remove prefix
            }
            
            // Decode base64 string
            $imageData = base64_decode($imageData);
            
            // Validate decoding
            if ($imageData === false) {
                return response()->json(['error' => 'Invalid base64 image'], 400);
            }
            
            // Generate a unique filename
            $imageName = 'profile_' . $user->id . '_' . time() . '.' . $extension;
            $imagePath = 'profile_images/' . $imageName;
            
            // Store image in public storage
            Storage::disk('public')->put($imagePath, $imageData);
            
            // Generate URL (store with base64 prefix for retrieval)
            $imageUrl = asset('storage/' . $imagePath);
        } else {
            $imageUrl = $user->image;
        }

        // Update user profile
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'address' => $request->address,
            'dob' => $request->dob,
            'image' => $imageUrl, // Store the image URL in the database
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        
        $response = [
            'message' => 'Profile updated successfully',
            'user' => $user
        ];

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $response = ['message' => 'Successfully logged out'];

        return response()->json($response);
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $otp = Str::random(6);
        $user->update([
            'password_reset_token' => $otp,
            'password_reset_token_expiry' => now()->addMinutes(10),
        ]);

        Mail::raw("Your OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Password Reset OTP');
        });

        return response()->json(['message' => 'OTP sent to your email']);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)
            ->where('password_reset_token', $request->otp)
            ->where('password_reset_token_expiry', '>', now())
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid or expired OTP'], 400);
        }

        return response()->json(['message' => 'OTP verified successfully']);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json(['message' => 'Password reset successfully']);
    }
}
