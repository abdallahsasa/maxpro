<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('identifier', 'about')->first();
        $commitments = Commitment::orderBy('order_column')->get();

        return view('about', compact('page', 'commitments'));
    }
}
