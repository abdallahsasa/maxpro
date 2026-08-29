<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_published', true)->orderBy('order_column')->get();

        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug->'.app()->getLocale(), $slug)
            ->orWhere('slug->en', $slug)
            ->orWhere('slug->fr', $slug)
            ->firstOrFail();

        return view('services.show', compact('service'));
    }
}
