<?php

namespace App\Http\Controllers\API;

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


/**
 * @OA\Info(
 *     title="Laravel API Authentication",
 *     version="1.0.0",
 *     description="API documentation for user authentication."
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="API Server"
 * )
 */
class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="User registration",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"first_name", "phone", "email", "password"},
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="phone", type="string", example="1234567890"),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123"),
     *             @OA\Property(property="password_confirmation", type="string", example="password123")
     *         )
     *     ),
     *     @OA\Response(response=201, description="User registered successfully"),
     *     @OA\Response(response=422, description="Validation errors")
     * )
     */
    public function register(Request $request)
    {
        Log::info('Register Request:', $request->all());
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

        Log::info('Register Response:', $response);

        return response()->json($response, 201);
    }
    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="User login",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Login successful"),
     *     @OA\Response(response=401, description="Invalid credentials"),
     *     @OA\Response(response=422, description="Validation errors")
     * )
     */
    public function login(Request $request)
    {
        Log::info('Login Request:', $request->all());
        
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email', // email field is optional
            'phone' => 'nullable|string', // phone field is optional
            'password' => 'required|string',
        ]);
        // dd($validator->fails());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if either email or phone is provided
        if ($request->has('email')) {
            // Check if user with the given email exists
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'Email not found. Please first register.'], 404);
            }
        } elseif ($request->has('phone')) {
            // Check if user with the given phone exists
            $user = User::where('phone', $request->phone)->first();

            if (!$user) {
                return response()->json(['message' => 'Phone number not found. Please first register.'], 404);
            }
        } else {
            return response()->json(['message' => 'Email or phone is required'], 422);
        }

        // Check if the user's status is inactive (0)
        if ($user->status == 0) {
            return response()->json(['message' => 'You are inactive. Contact admin.'], 403);
        }

        // Attempt to authenticate the user using the provided password
        if (!Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Password incorrect'], 401);
        }

        // Generate the access token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Response data
        $response = [
            'message' => 'Logged in successfully',
            'access_token' => $token,
            'data' => $user,
        ];

        // Log the response
        Log::info('User Logged In', $response);

        return response()->json($response);
    }
    /**
     * @OA\Put(
     *     path="/api/update-profile/{id}",
     *     summary="Update user profile",
     *     tags={"Profile"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"first_name", "phone", "email", "country", "address"},
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="phone", type="string", example="1234567890"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="country", type="string", example="USA"),
     *             @OA\Property(property="state", type="string", example="California"),
     *             @OA\Property(property="address", type="string", example="123 Main St, Los Angeles, CA"),
     *             @OA\Property(property="dob", type="string", format="date", example="1990-05-15"),
     *             @OA\Property(property="image", type="string", description="Base64 encoded image string"),
     *             @OA\Property(property="password", type="string", format="password", example="newpassword123"),
     *             @OA\Property(property="password_confirmation", type="string", example="newpassword123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Profile updated successfully"),
     *     @OA\Response(response=404, description="User not found"),
     *     @OA\Response(response=422, description="Validation errors")
     * )
     */

    public function updateProfile(Request $request, $id)
    {
        Log::info('Profile Update_Request', $request->all());
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validation
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
        ], [
            'dob.before' => 'The date of birth must be before today.',
            'password.confirmed' => 'The password confirmation does not match.'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle Base64 Image Upload
        if ($request->has('image')) {
            $imageData = $request->image;
            $imageName = 'profile_' . $user->id . '_' . time() . '.png';
            $imagePath = 'profile_images/' . $imageName;

            // Decode base64 and store image
            Storage::disk('public')->put($imagePath, base64_decode($imageData));

            // Generate full URL
            $imageUrl = asset('storage/' . $imagePath);
        } else {
            $imageUrl = $user->image; // Keep existing image if not updated
        }

        // Update user details
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'address' => $request->address,
            'dob' => $request->dob,
            'image' => $imageUrl, // Store URL in the database
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $response = [
            'message' => 'Profile updated successfully',
            'user' => $user,
        ];

        // Log the response
        Log::info('User Profile Updated', $response);

        return response()->json($response);
    }
    /**
     * @OA\Post(
     *     path="/api/logout",
     *     summary="User logout",
     *     tags={"Authentication"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(response=200, description="Successfully logged out")
     * )
     */
    public function logout(Request $request)
    {
        Log::info('Logout Request Payload', $request->all());

        $request->user()->currentAccessToken()->delete();

        $response = [
            'message' => 'Successfully logged out',
        ];

        Log::info('Logout Response', $response);

        return response()->json($response);
    }
    /**
     * @OA\Post(
     *     path="/api/forgot-password",
     *     summary="Forgot password request",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com")
     *         )
     *     ),
     *     @OA\Response(response=200, description="OTP sent to email"),
     *     @OA\Response(response=404, description="User not found")
     * )
     */
    public function forgotPassword(Request $request)
    {
        Log::info('Forgot Password Request Payload', $request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            Log::info('Forgot Password Validation Errors', $errors);
            return response()->json(['errors' => $errors], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $message = 'User not found';
            Log::info('Forgot Password Response', ['message' => $message]);
            return response()->json(['message' => $message], 404);
        }

        $otp = Str::random(6);
        $user->update([
            'password_reset_token' => $otp,
            'password_reset_token_expiry' => now()->addMinutes(10),
        ]);

        Mail::raw("Your OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Password Reset OTP');
        });

        $response = ['message' => 'OTP sent to your email'];
        Log::info('Forgot Password Response', $response);

        return response()->json($response);
    }
    /**
     * @OA\Post(
     *     path="/api/verify-otp",
     *     summary="Verify OTP for password reset",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "otp"},
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="otp", type="string", example="123456")
     *         )
     *     ),
     *     @OA\Response(response=200, description="OTP verified successfully"),
     *     @OA\Response(response=400, description="Invalid or expired OTP")
     * )
     */
    public function verifyOtp(Request $request)
    {
        Log::info('Verify OTP Request Payload', $request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            Log::info('Verify OTP Validation Errors', $errors);
            return response()->json(['errors' => $errors], 422);
        }

        $user = User::where('email', $request->email)
            ->where('password_reset_token', $request->otp)
            ->where('password_reset_token_expiry', '>', now())
            ->first();

        if (!$user) {
            $message = 'Invalid or expired OTP';
            Log::info('Verify OTP Response', ['message' => $message]);
            return response()->json(['message' => $message], 400);
        }

        $response = ['message' => 'OTP verified successfully'];
        Log::info('Verify OTP Response', $response);

        return response()->json($response);
    }
    /**
     * @OA\Post(
     *     path="/api/reset-password",
     *     summary="Reset password",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "otp", "password", "password_confirmation"},
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="otp", type="string", example="123456"),
     *             @OA\Property(property="password", type="string", format="password", example="newpassword123"),
     *             @OA\Property(property="password_confirmation", type="string", example="newpassword123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Password reset successfully"),
     *     @OA\Response(response=400, description="Invalid or expired OTP"),
     *     @OA\Response(response=422, description="Validation errors")
     * )
     */
    public function resetPassword(Request $request)
    {
        Log::info('Reset Password Request Payload', $request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            Log::info('Reset Password Validation Errors', $errors);
            return response()->json(['errors' => $errors], 422);
        }

        $user = User::where('email', $request->email)
            ->where('password_reset_token', $request->otp)
            ->where('password_reset_token_expiry', '>', now())
            ->first();

        if (!$user) {
            $message = 'Invalid or expired OTP';
            Log::info('Reset Password Response', ['message' => $message]);
            return response()->json(['message' => $message], 400);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'password_reset_token' => null,
            'password_reset_token_expiry' => null,
        ]);

        $response = ['message' => 'Password reset successfully'];
        Log::info('Reset Password Response', $response);

        return response()->json($response);
    }
}
