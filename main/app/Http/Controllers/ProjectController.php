<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::active()->ordered()->with('images')->get();
        $types = Project::active()->whereNotNull('type')->distinct()->pluck('type')->filter()->values();

        return view('projects', compact('projects', 'types'));
    }

    public function show($id)
    {
        $project = Project::active()->with('images')->findOrFail($id);

        $others = Project::active()->ordered()->where('id', '!=', $project->id)->limit(3)->get();

        return view('project-detail', compact('project', 'others'));
    }
}
