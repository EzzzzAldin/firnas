<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Mail::send('emails.contact-message', compact('data'), function ($message) use ($data) {
            $message->to('sales_hamarketing@nassargro.com')
                ->subject('New Contact Form Submission');
        });

        return back()->with('success', 'Message sent successfully!');
    }
}
