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
use Illuminate\Support\Facades\View;


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
            'vehical_id' => 'nullable|exists:vehicals,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|numeric',
            'type'       => 'nullable|string|in:buy,sell',
            'description' => 'nullable|string',
        ];

        $messages = [
            'name.required'     => 'Please enter your contact name.',
            'email.required'    => 'Please enter your email address.',
            'email.email'       => 'Please enter a valid email address.',
            'phone.numeric'     => 'Please enter only digits in the phone number.',
            'vehical_id.exists' => 'The selected vehicle is invalid.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Save inquiry
            $inquiry = new Inquiry();
            $inquiry->vehical_id  = $request->vehical_id;
            $inquiry->name        = $request->name;
            $inquiry->email       = $request->email;
            $inquiry->phone       = $request->phone;
            $inquiry->type        = $request->type ?? 'buy';
            $inquiry->description = $request->description ?? null;
            $inquiry->status      = 0;
            $inquiry->save();

            // Prepare mail data
            $mailData = [
                'name'       => $inquiry->name,
                'email'      => $inquiry->email,
                'phone'      => $inquiry->phone,
                'type'       => $inquiry->type,
                'vehical_id' => $inquiry->vehical_id ?? 'N/A',
                'description' => $inquiry->description ?? 'N/A',
            ];

            // Get all admin emails
            $adminEmails = User::where('role', 'admin')->pluck('email')->toArray();

            // Send email to each admin
            foreach ($adminEmails as $adminEmail) {
                $adminMailData = [
                    'spy_id'           => null,
                    'email_to'         => $adminEmail,
                    'email_to_name'    => 'Admin',
                    'email_from'       => config('mail.from.address'),
                    'email_from_name'  => config('mail.from.name'),
                    'subject'          => 'New Inquiry Received',
                    'text'             => 'A new inquiry has been received.',
                    'tag'              => 'Vehicle Inquiry Notification',
                    'reply_to'         => $inquiry->email,
                ];

                $adminView = View::make('emails.admin_inquiry')->with('mailData', $mailData);
                $adminMailData['body'] = (string) $adminView;

                sendMail(
                    $adminMailData['email_to'],
                    $adminMailData['email_to_name'],
                    $adminMailData['email_from_name'],
                    $adminMailData['email_from'],
                    $adminMailData['subject'],
                    $adminMailData['body'],
                    $adminMailData['text'],
                    $adminMailData['tag'],
                    $adminMailData['reply_to']
                );
            }

            // Send confirmation to user
            $userMailData = [
                'spy_id'           => null,
                'email_to'         => $inquiry->email,
                'email_to_name'    => $inquiry->name,
                'email_from'       => config('mail.from.address'),
                'email_from_name'  => config('mail.from.name'),
                'subject'          => 'Thank You for Your Inquiry',
                'text'             => 'We have received your inquiry and will get back to you soon.',
                'tag'              => 'User Inquiry Confirmation',
                'reply_to'         => config('mail.from.address'),
            ];

            $userView = View::make('emails.user_inquiry')->with('mailData', $mailData);
            $userMailData['body'] = (string) $userView;

            sendMail(
                $userMailData['email_to'],
                $userMailData['email_to_name'],
                $userMailData['email_from_name'],
                $userMailData['email_from'],
                $userMailData['subject'],
                $userMailData['body'],
                $userMailData['text'],
                $userMailData['tag'],
                $userMailData['reply_to']
            );

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for your inquiry. We will get back to you soon.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.'
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

        // Inquiry data
        $inquiryData = [
            'name'           => $request->name,
            'email'          => $request->email,
            'subject'        => $request->subject,
            'inquiryMessage' => $request->message,
        ];

        // Get admin emails
        $adminEmails = User::where('role', 'admin')->pluck('email')->toArray();

        // Send email to admins
        foreach ($adminEmails as $adminEmail) {
            $adminMailData = [
                'spy_id' => null,
                'email_to' => $adminEmail,
                'email_to_name' => 'Admin',
                'email_from' => config('mail.from.address'),
                'email_from_name' => config('mail.from.name'),
                'subject' => 'New Inquiry Received',
                'text' => 'A new inquiry has been received.',
                'tag' => 'Inquiry Notification',
                'reply_to' => $request->email,
            ];

            $adminView = View::make('emails.sadmin_inquiry')->with($inquiryData);
            $adminMailData['body'] = (string) $adminView;

            sendMail(
                $adminMailData['email_to'],
                $adminMailData['email_to_name'],
                $adminMailData['email_from_name'],
                $adminMailData['email_from'],
                $adminMailData['subject'],
                $adminMailData['body'],
                $adminMailData['text'],
                $adminMailData['tag'],
                $adminMailData['reply_to']
            );
        }

        // Send confirmation email to the user
        $userMailData = [
            'spy_id' => null,
            'email_to' => $request->email,
            'email_to_name' => $request->name,
            'email_from' => config('mail.from.address'),
            'email_from_name' => config('mail.from.name'),
            'subject' => 'Inquiry Confirmation',
            'text' => 'Thank you for your inquiry. We will contact you soon.',
            'tag' => 'User Inquiry Confirmation',
            'reply_to' => config('mail.from.address'),
        ];

        $userView = View::make('emails.suser_inquiry')->with($inquiryData);
        $userMailData['body'] = (string) $userView;

        sendMail(
            $userMailData['email_to'],
            $userMailData['email_to_name'],
            $userMailData['email_from_name'],
            $userMailData['email_from'],
            $userMailData['subject'],
            $userMailData['body'],
            $userMailData['text'],
            $userMailData['tag'],
            $userMailData['reply_to']
        );

        return back()->with('success', 'Your inquiry has been sent successfully.');
    }
}
