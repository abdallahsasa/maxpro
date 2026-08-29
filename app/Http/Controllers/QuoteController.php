<?php

namespace App\Http\Controllers;

use App\Models\QuoteAttachment;
use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $services = Service::where('is_published', true)->orderBy('order_column')->get();

        return view('quote', compact('services'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'project_location' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'approximate_surface_area' => 'nullable|string|max:255',
            'expected_start_date' => 'nullable|string|max:255',
            'project_description' => 'required|string',
            'services' => 'array',
            'services.*' => 'exists:services,id',
            'attachments' => 'array|max:5',
            'attachments.*' => 'file|max:10240',
        ]);

        $quote = QuoteRequest::create([
            'company_name' => $validated['company_name'],
            'contact_name' => $validated['contact_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'project_location' => $validated['project_location'],
            'project_type' => $validated['project_type'],
            'approximate_surface_area' => $validated['approximate_surface_area'] ?? null,
            'expected_start_date' => $validated['expected_start_date'] ?? null,
            'project_description' => $validated['project_description'],
            'ip_address' => $request->ip(),
        ]);

        if (! empty($validated['services'])) {
            $quote->services()->attach($validated['services']);
        }

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('quote_attachments', 'public');
                QuoteAttachment::create([
                    'quote_request_id' => $quote->id,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);
            }
        }

        return back()->with('success', 'Your quote request has been submitted. Our team will contact you shortly.');
    }
}
