<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            // 'cf-turnstile-response' => 'required',
        ]);
        $validated['ip_address'] = $request->ip();
        ContactRequest::create($validated);

        return back()->with('success', 'Your message has been sent successfully. We will get back to you soon.');
    }
}
