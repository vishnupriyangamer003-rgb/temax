<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Support\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::ordered()->withCount('items')->get();

        return view('admin.products.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.products.form', [
            'category'  => null,
            'itemsText' => '',
        ]);
    }

    public function edit(ProductCategory $product)
    {
        $product->load('items');

        $lines = $product->items->map(function ($item) {
            return $item->name . ($item->description ? ' :: ' . $item->description : '');
        });

        return view('admin.products.form', [
            'category'  => $product,
            'itemsText' => implode("\n", $lines->all()),
        ]);
    }

    public function store(Request $request)
    {
        $this->save($request, new ProductCategory());

        return redirect()->route('admin.products.index')->with('success', 'Product category created successfully.');
    }

    public function update(Request $request, ProductCategory $product)
    {
        $this->save($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Product category updated successfully.');
    }

    public function destroy(ProductCategory $product)
    {
        Uploader::delete($product->image);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product category deleted.');
    }

    private function save(Request $request, ProductCategory $category)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'items_text'   => 'nullable|string',
            'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'remove_image' => 'nullable|boolean',
            'sort_order'   => 'nullable|integer|min:0|max:9999',
            'is_active'    => 'nullable|boolean',
        ]);

        DB::transaction(function () use ($request, $category) {
            $oldImage = $category->image;

            $category->fill([
                'title'       => $request->input('title'),
                'description' => $request->input('description'),
                'sort_order'  => (int) $request->input('sort_order', 0),
                'is_active'   => $request->boolean('is_active'),
            ]);

            if ($request->boolean('remove_image')) {
                Uploader::delete($oldImage);
                $category->image = null;
            } elseif ($request->hasFile('image_file')) {
                $stored = Uploader::store($request->file('image_file'), 'products');
                if ($stored) {
                    Uploader::delete($oldImage);
                    $category->image = $stored;
                }
            }

            $category->save();

            // One product per line: "Name" or "Name :: short description".
            $category->items()->delete();
            $lines = preg_split('/\R/', (string) $request->input('items_text'));

            foreach ((array) $lines as $index => $line) {
                $line = trim($line);
                if ($line === '') {
                    continue;
                }

                $parts = array_map('trim', explode('::', $line, 2));

                $category->items()->create([
                    'name'        => $parts[0],
                    'description' => $parts[1] ?? null,
                    'sort_order'  => $index,
                ]);
            }
        });
    }
}
