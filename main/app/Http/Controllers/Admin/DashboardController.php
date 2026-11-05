<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'services'    => Service::count(),
            'products'    => ProductCategory::withCount('items')->ordered()->get(),
            'projects'    => Project::count(),
            'newEnquiries' => Enquiry::unread()->count(),
            'enquiries'   => Enquiry::latest()->limit(8)->get(),
            'recentEnquiriesTotal' => Enquiry::count(),
        ]);
    }
}
