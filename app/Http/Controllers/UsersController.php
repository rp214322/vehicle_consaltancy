<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehical;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        $rules = [
            'first_name' => 'required|max:30',
            'last_name' => 'nullable|max:30',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|max:20|unique:users,phone,' . Auth::id(),
            'country' => 'required|string|max:100',
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
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $imageName);
            $user->image = 'uploads/profiles/' . $imageName;
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
