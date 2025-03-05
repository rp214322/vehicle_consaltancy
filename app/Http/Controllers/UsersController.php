<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehical;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:30',
            'last_name' => 'nullable|max:30',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|max:20|unique:users,phone,' . Auth::id(),
            'country' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

    public function FavouriteList()
    {
        $vehicals = Vehical::whereIn('id', Auth::user()->favourite_vehicals()->pluck('vehical_id')->toArray())->get();
        return view('favourite_list', compact('vehicals'));
    }
}
