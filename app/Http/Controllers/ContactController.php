<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 1. Save to database
        Contact::create($validated);

        // 2. Send email
        Mail::raw("Name: {$validated['name']}\nEmail: {$validated['email']}\nMessage: {$validated['message']}", function($message) use ($validated) {
            $message->to('nagparul1@gmail.com')
                    ->subject('New Contact Form Submission');
        });

        return back()->with('success', 'Message sent successfully!');
    }
}
