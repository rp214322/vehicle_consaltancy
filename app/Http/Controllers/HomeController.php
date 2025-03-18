<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminInquiryMail;
use App\Mail\UserInquiryMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the About page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the Contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }
    public function storeInquiry(Request $request)
    {
        $rules = [
            'vehical_id' => 'nullable|exists:vehicals,id', // Vehicle ID is optional
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'type' => 'nullable|string|in:buy,sell',
            'description' => 'nullable|string',
        ];

        $messages = [
            'name.required' => 'Please enter your contact name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.numeric' => 'Please enter only digits in the phone number.',
            'vehical_id.exists' => 'The selected vehicle is invalid.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction(); // Start Transaction

        try {
            // Create Inquiry
            $inquiry = new Inquiry();
            $inquiry->vehical_id = $request->get('vehical_id', null); // Ensure null if not provided
            $inquiry->name = $request->get('name');
            $inquiry->email = $request->get('email');
            $inquiry->phone = $request->get('phone');
            $inquiry->type = $request->has('type') ? $request->type : 'buy'; // Default to 'buy' if not provided
            $inquiry->description = $request->get('description', null);
            $inquiry->status = 0;
            $inquiry->save();

            // Fetch All Admin Emails
            $adminEmails = User::where('role', 'admin')->pluck('email')->toArray();

            if (!empty($adminEmails)) {
                Mail::to($adminEmails)->send(new AdminInquiryMail($inquiry));
            }

            Mail::to($request->email)->send(new UserInquiryMail($inquiry));

            DB::commit(); // Commit Transaction

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for your inquiry. We will get back to you soon.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback on Error

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while processing your request. Please try again later.'
            ], 500);
        }
    }
    public function sendInquiry(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Get admin emails
        $adminEmails = User::where('role', 'admin')->pluck('email')->toArray();

        // Inquiry data
        $inquiryData = [
            'name'           => $request->name,
            'email'          => $request->email,
            'subject'        => $request->subject,
            'inquiryMessage' => $request->message, // Renamed to avoid conflict
        ];

        // Send email to admin
        Mail::send('emails.sadmin_inquiry', $inquiryData, function ($message) use ($adminEmails) {
            $message->to($adminEmails)
                ->subject('New Inquiry Received');
        });

        // Send confirmation email to user
        Mail::send('emails.suser_inquiry', $inquiryData, function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Inquiry Confirmation');
        });

        return back()->with('success', 'Your inquiry has been sent successfully.');
    }
}
