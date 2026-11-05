<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::active()->ordered()->with('items')->get();

        return view('products', compact('categories'));
    }
}
