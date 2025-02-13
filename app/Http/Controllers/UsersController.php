<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehical;
use App\Models\Feedback;
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
            'gender' => 'nullable|in:male,female,other',
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
        $user->gender = $request->input('gender');

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

    public function StoreFeedback(Request $request)
    {
        $rules = array(
            'rating' => 'required',
        );
        $messages = array(
            'rating.required' => 'Please select rate.',
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        //   try {

        $feedback = new Feedback;
        $feedback->user_id = $request->has('user_id') ? $request->get('user_id') : NULL;
        $feedback->rating = $request->get('rating');
        $feedback->description = $request->get('description');
        $feedback->save();

        // Mail::send('emails.contact', ['data' => $request->all()], function($message) use($request) {
        //   $message->to(config()->get('settings.email'));
        //   $message->subject('Submission from ' . title_case($request->get('name')));
        // });
        // Mail::send('emails.thank_you', ['data' => $request->all()], function($message) use($request) {
        //   $message->to($request->get('email'));
        //   $message->subject('Thank you for contact us.');
        // });
        return response()->json(['success', 'Thank you valuable feedback.'], 200);
        //   } catch (Exception $e) {
        //       return redirect()->back()
        //                       ->withErrors($validator)
        //                       ->withInput()
        //                       ->with('error', $e->getMessage());
        //   }
    }
}
