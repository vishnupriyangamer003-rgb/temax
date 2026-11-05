<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Support\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->withCount('images')->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', [
            'project' => null,
            'types'   => $this->types(),
        ]);
    }

    public function edit(Project $project)
    {
        $project->load('images');

        return view('admin.projects.form', [
            'project' => $project,
            'types'   => $this->types(),
        ]);
    }

    public function store(Request $request)
    {
        $this->save($request, new Project());

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function update(Request $request, Project $project)
    {
        $this->save($request, $project);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        foreach ($project->images as $image) {
            Uploader::delete($image->path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    private function types()
    {
        return ['Cement' => 'Cement', 'Thermal' => 'Thermal / Power', 'Glass' => 'Glass', 'Other' => 'Other'];
    }

    private function save(Request $request, Project $project)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'place'          => 'nullable|string|max:255',
            'type'           => 'nullable|string|max:60',
            'text'           => 'nullable|string',
            'images.*'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'remove_images'  => 'nullable|array',
            'remove_images.*' => 'integer|exists:project_images,id',
            'sort_order'     => 'nullable|integer|min:0|max:9999',
            'is_active'      => 'nullable|boolean',
        ]);

        DB::transaction(function () use ($request, $project) {
            $project->fill([
                'title'      => $request->input('title'),
                'place'      => $request->input('place'),
                'type'       => $request->input('type'),
                'text'       => $request->input('text'),
                'sort_order' => (int) $request->input('sort_order', 0),
                'is_active'  => $request->boolean('is_active'),
            ]);
            $project->save();

            // Remove ticked images.
            foreach ((array) $request->input('remove_images', []) as $imageId) {
                $image = $project->images()->where('id', $imageId)->first();
                if ($image) {
                    Uploader::delete($image->path);
                    $image->delete();
                }
            }

            // Append newly uploaded images.
            if ($request->hasFile('images')) {
                $next = (int) $project->images()->max('sort_order') + 1;

                foreach ($request->file('images') as $file) {
                    $stored = Uploader::store($file, 'projects');
                    if ($stored) {
                        $project->images()->create([
                            'path'       => $stored,
                            'sort_order' => $next++,
                        ]);
                    }
                }
            }
        });
    }
}
