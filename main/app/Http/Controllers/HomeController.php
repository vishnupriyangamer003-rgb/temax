<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HomeSlide;
use App\Models\Project;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'slides'       => HomeSlide::active()->ordered()->get(),
            'homeServices' => Service::active()->ordered()->with('items')->get(),
            'homeProjects' => Project::active()->ordered()->with('images')->limit(6)->get(),
            'clients'      => Client::active()->ordered()->get(),
        ]);
    }
}
