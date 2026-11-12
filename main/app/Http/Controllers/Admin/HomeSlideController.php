<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use App\Support\Uploader;
use Illuminate\Http\Request;

class HomeSlideController extends Controller
{
    public function index()
    {
        return view('admin.slides.index', ['slides' => HomeSlide::ordered()->get()]);
    }

    public function create()
    {
        return view('admin.slides.form', ['slide' => null]);
    }

    public function store(Request $request)
    {
        $this->save($request, new HomeSlide());

        return redirect()->route('admin.slides.index')->with('success', 'Banner slide created.');
    }

    public function edit(HomeSlide $slide)
    {
        return view('admin.slides.form', compact('slide'));
    }

    public function update(Request $request, HomeSlide $slide)
    {
        $this->save($request, $slide);

        return redirect()->route('admin.slides.index')->with('success', 'Banner slide updated.');
    }

    public function destroy(HomeSlide $slide)
    {
        Uploader::delete($slide->image);
        $slide->delete();

        return redirect()->route('admin.slides.index')->with('success', 'Banner slide deleted.');
    }

    private function save(Request $request, HomeSlide $slide)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'highlight'   => 'nullable|string|max:255',
            'text'        => 'nullable|string|max:600',
            'image_file'  => ($slide->exists ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,webp|max:6144',
            'sort_order'  => 'nullable|integer|min:0|max:9999',
            'is_active'   => 'nullable|boolean',
        ]);

        $slide->fill([
            'title'       => $request->input('title'),
            'highlight'   => $request->input('highlight'),
            'text'        => $request->input('text'),
            'sort_order'  => (int) $request->input('sort_order', 0),
            'is_active'   => $request->boolean('is_active'),
        ]);

        if ($request->hasFile('image_file')) {
            $stored = Uploader::store($request->file('image_file'), 'slides');
            if ($stored) {
                Uploader::delete($slide->image);
                $slide->image = $stored;
            }
        }

        $slide->save();
    }
}
