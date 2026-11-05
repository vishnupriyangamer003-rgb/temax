<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->with('items')->get();

        return view('services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::active()->where('slug', $slug)->with(['items', 'steps'])->firstOrFail();

        $others = Service::active()->ordered()->where('id', '!=', $service->id)->limit(3)->get();

        return view('service-detail', compact('service', 'others'));
    }
}
