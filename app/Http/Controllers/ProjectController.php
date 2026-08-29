<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sector;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
        if ($request->has('sector')) {
            $query->whereHas('sector', function ($q) use ($request) {
                $q->where('slug->en', $request->sector)->orWhere('slug->fr', $request->sector);
            });
        }
        $projects = $query->latest('published_at')->paginate(12);
        $sectors = Sector::where('is_published', true)->orderBy('order_column')->get();

        return view('projects.index', compact('projects', 'sectors'));
    }

    public function show($slug)
    {
        $project = Project::where('slug->'.app()->getLocale(), $slug)
            ->orWhere('slug->en', $slug)
            ->orWhere('slug->fr', $slug)
            ->firstOrFail();

        return view('projects.show', compact('project'));
    }
}
