<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'homeServices' => Service::active()->ordered()->with('items')->get(),
            'homeProjects' => Project::active()->ordered()->with('images')->limit(6)->get(),
            'testimonials' => Testimonial::active()->ordered()->get(),
            'clients'      => Client::active()->ordered()->get(),
        ]);
    }
}
