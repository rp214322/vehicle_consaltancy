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


/**
 * @OA\Info(
 *     title="HVAC API",
 *     version="1.0.0",
 *     description="API documentation for HVAC."
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

        Log::info('User Logged In', $response);

        return response()->json($response);
    }

    public function updateProfile(Request $request, $id)
    {
        Log::info('Profile Update_Request', $request->all());

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'country' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'dob' => 'nullable|date|before:today',
            'image' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->has('image')) {
            $imageData = $request->image;
            $imageName = 'profile_' . $user->id . '_' . time() . '.png';
            $imagePath = 'profile_images/' . $imageName;
            Storage::disk('public')->put($imagePath, base64_decode($imageData));
            $imageUrl = asset('storage/' . $imagePath);
        } else {
            $imageUrl = $user->image;
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'address' => $request->address,
            'dob' => $request->dob,
            'image' => $imageUrl,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $response = [
            'message' => 'Profile updated successfully',
            'user' => $user,
        ];

        Log::info('User Profile Updated', $response);

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        Log::info('Logout Request Payload', $request->all());

        $request->user()->currentAccessToken()->delete();

        $response = ['message' => 'Successfully logged out'];

        Log::info('Logout Response', $response);

        return response()->json($response);
    }

    public function forgotPassword(Request $request)
    {
        Log::info('Forgot Password Request Payload', $request->all());

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
        Log::info('Verify OTP Request Payload', $request->all());

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
        Log::info('Reset Password Request Payload', $request->all());

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
