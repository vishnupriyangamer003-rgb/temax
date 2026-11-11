<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Support\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->withCount('items')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', [
            'service' => null,
            'itemsText'  => '',
            'stepsText'  => '',
            'introText'  => '',
            'pointsText' => '',
        ]);
    }

    public function edit(Service $service)
    {
        $service->load(['items', 'steps']);

        return view('admin.services.form', [
            'service'    => $service,
            'itemsText'  => implode("\n", $service->items->map(fn ($i) => trim($i->title . ($i->text ? ' | ' . $i->text : '')))->all()),
            'stepsText'  => implode("\n", $service->steps->map(fn ($s) => trim($s->title . ($s->text ? ' | ' . $s->text : '')))->all()),
            'introText'  => implode("\n", (array) $service->intro),
            'pointsText' => implode("\n", (array) $service->points),
        ]);
    }

    public function store(Request $request)
    {
        $this->save($request, new Service());

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function update(Request $request, Service $service)
    {
        $this->save($request, $service);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        Uploader::delete($service->image);
        Uploader::delete($service->image_a);
        Uploader::delete($service->image_b);

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }

    private function save(Request $request, Service $service)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255',
            'summary'      => 'nullable|string',
            'lead'         => 'nullable|string',
            'badge'        => 'nullable|string|max:120',
            'items_title'  => 'nullable|string|max:160',
            'cta_title'    => 'nullable|string|max:160',
            'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'remove_image' => 'nullable|boolean',
            'sort_order'   => 'nullable|integer|min:0|max:9999',
            'is_active'    => 'nullable|boolean',
            'items_text'   => 'nullable|string',
            'steps_text'   => 'nullable|string',
            'intro_text'   => 'nullable|string',
            'points_text'  => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $service) {
            $slug = Str::slug($request->input('slug') ?: $request->input('title'));
            $slug = $this->uniqueSlug($slug ?: 'service', $service);
            $oldImage = $service->image;

            $service->fill([
                'slug'       => $slug,
                'title'      => $request->input('title'),
                'summary'    => $request->input('summary'),
                'lead'       => $request->input('lead'),
                'badge'      => $request->input('badge'),
                'items_title' => $request->input('items_title'),
                'cta_title'  => $request->input('cta_title'),
                'intro'      => $this->lines($request->input('intro_text')),
                'points'     => $this->lines($request->input('points_text')),
                'sort_order' => (int) $request->input('sort_order', 0),
                'is_active'  => $request->boolean('is_active'),
            ]);

            if ($request->boolean('remove_image')) {
                Uploader::delete($oldImage);
                $service->image = null;
            } elseif ($request->hasFile('image_file')) {
                $stored = Uploader::store($request->file('image_file'), 'services');
                if ($stored) {
                    Uploader::delete($oldImage);
                    $service->image = $stored;
                }
            }

            $service->save();

            // Feature lines: "Title | description" (or just "Title"). The website no longer
            // shows them and the form has no field, so only rewrite when the field is sent.
            if ($request->has('items_text')) {
                $service->items()->delete();
                foreach ($this->pairs($request->input('items_text')) as $index => [$title, $text]) {
                    $service->items()->create([
                        'title'      => $title,
                        'text'       => $text,
                        'sort_order' => $index,
                    ]);
                }
            }

            if ($request->has('steps_text')) {
                $service->steps()->delete();
                foreach ($this->pairs($request->input('steps_text')) as $index => [$title, $text]) {
                    $service->steps()->create([
                        'title'      => $title,
                        'text'       => $text,
                        'sort_order' => $index,
                    ]);
                }
            }
        });
    }

    private function lines($text)
    {
        $lines = preg_split('/\R/', (string) $text);
        $out = [];

        foreach ((array) $lines as $line) {
            $line = trim($line);
            if ($line !== '') {
                $out[] = $line;
            }
        }

        return $out;
    }

    private function pairs($text)
    {
        $out = [];

        foreach ($this->lines($text) as $line) {
            $parts = array_map('trim', explode('|', $line, 2));
            $out[] = [$parts[0], $parts[1] ?? null];
        }

        return $out;
    }

    private function uniqueSlug($slug, Service $service)
    {
        $base = $slug;
        $candidate = $slug;
        $suffix = 2;

        while (Service::where('slug', $candidate)->where('id', '!=', $service->id ?: 0)->exists()) {
            $candidate = $base . '-' . $suffix;
            $suffix++;
        }

        return $candidate;
    }
}
