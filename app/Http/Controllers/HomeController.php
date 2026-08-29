<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Statistic;

class HomeController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('order_column')->get();
        $services = Service::where('is_published', true)->orderBy('order_column')->take(4)->get();
        $featuredProjects = Project::with('sector')->where('is_featured', true)->latest('published_at')->take(4)->get();
        $partners = Partner::where('is_active', true)->orderBy('order_column')->get();
        $commitments = Commitment::orderBy('order_column')->take(4)->get();

        return view('welcome', compact('statistics', 'services', 'featuredProjects', 'partners', 'commitments'));
    }
}
