<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function getLogin()
    {
        if (!Auth::guest()) {
            return redirect()->route('admin.dashboard')->with('info', 'You are already logged in !!');
        } elseif (Cookie::get('auth_remember')) {
            $user_id = Crypter::decrypt(Cookie::get('auth_remember'));
            Auth::login($user_id);
            Log::info('Admin login via remember cookie', ['admin_id' => $user_id]);
            return redirect()->route('admin.dashboard')->with('success', 'You have logged in successfully.');
        }
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
        $value = $request->get('email');
        $credentials = array($field => $value, 'password' => $request->get('password'), 'role' => 'admin');

        if (Auth::attempt($credentials)) {
            Log::info('Admin login successful', ['admin_id' => Auth::id(), 'email' => $value]);
            return redirect()->route('admin.dashboard')->with('success', 'You have logged in successfully.');
        } else {
            Log::warning('Admin login failed', ['email' => $value]);
            return redirect()->back()->with('error', "Invalid email or password.")->withInput($request->except('password'));
        }
    }

    public function getLogout()
    {
        $admin_id = Auth::id();
        Log::info('Admin logout', ['admin_id' => $admin_id]);

        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('admin.auth.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        // Define validation rules
        $rules = [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|max:20|unique:users,phone,' . Auth::id(),
            'country' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Only allow image files
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Please correct the errors.');
        }

        $user = Auth::user();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->address = $request->input('address');
        $user->dob = $request->input('dob');

        if ($request->has('password') && !empty($request->password)) {
            $user->password = Hash::make($request->get('password'));
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = 'profile_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('profile_images', $imageName, 'public');
            $user->image = $imagePath; // Save path in DB
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function getPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function postPassword(Request $request)
    {
        $rules = [
            'old_password'  => ['required'],
            'password'  => ['required', 'min:6', 'max:20', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'alpha_num']
        ];
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->with('error', 'Please correct the following errors');
        }

        $current_password = Auth::user()->password;
        $old_password = $request->get('old_password');

        if (Hash::check($old_password, $current_password)) {
            $new_pass = Hash::make($request->get('password'));
            $user = User::find(Auth::user()->id);
            $user->password = $new_pass;
            $user->save();

            Log::info('Admin password changed', ['admin_id' => $user->id]);

            return redirect()->back()->with('success', 'Your password was successfully changed');
        } else {
            Log::warning('Admin password change failed - Incorrect old password', ['admin_id' => Auth::id()]);

            return redirect()->back()->with('error', 'Please enter the correct old password');
        }
    }
}
