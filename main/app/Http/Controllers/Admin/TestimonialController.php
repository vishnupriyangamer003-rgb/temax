<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Support\Uploader;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => null]);
    }

    public function store(Request $request)
    {
        $this->save($request, new Testimonial());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $this->save($request, $testimonial);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar && !str_starts_with($testimonial->avatar, 'assets/')) {
            Uploader::delete($testimonial->avatar);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }

    private function save(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company'     => 'nullable|string|max:255',
            'title'       => 'nullable|string|max:255',
            'content'     => 'required|string',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'rating'      => 'nullable|integer|min:1|max:5',
            'sort_order'  => 'nullable|integer|min:0|max:9999',
            'is_active'   => 'nullable|boolean',
        ]);

        $testimonial->fill([
            'name'        => $request->input('name'),
            'designation' => $request->input('designation'),
            'company'     => $request->input('company'),
            'title'       => $request->input('title'),
            'content'     => $request->input('content'),
            'rating'      => (int) $request->input('rating', 5),
            'sort_order'  => (int) $request->input('sort_order', 0),
            'is_active'   => $request->boolean('is_active'),
        ]);

        if ($request->hasFile('avatar_file')) {
            if ($testimonial->avatar && !str_starts_with($testimonial->avatar, 'assets/')) {
                Uploader::delete($testimonial->avatar);
            }
            $testimonial->avatar = Uploader::upload($request->file('avatar_file'), 'testimonials');
        }

        $testimonial->save();
    }
}

