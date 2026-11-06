<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public website
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', function () {
    session(['temax_form_loaded_at' => time()]);

    return view('contact', ['services' => \App\Models\Service::active()->ordered()->get()]);
})->name('contact');

Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('enquiries.store');

/*
|--------------------------------------------------------------------------
| Admin panel (/ktgadmin)
|--------------------------------------------------------------------------
*/

Route::redirect('/admin', '/ktgadmin');

Route::prefix('ktgadmin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1')->name('login.attempt');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Services
        Route::get('services', [AdminServiceController::class, 'index'])->name('services.index');
        Route::get('services/create', [AdminServiceController::class, 'create'])->name('services.create');
        Route::post('services', [AdminServiceController::class, 'store'])->name('services.store');
        Route::get('services/{service}/edit', [AdminServiceController::class, 'edit'])->name('services.edit');
        Route::put('services/{service}', [AdminServiceController::class, 'update'])->name('services.update');
        Route::delete('services/{service}', [AdminServiceController::class, 'destroy'])->name('services.destroy');

        // Products
        Route::get('products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

        // Projects
        Route::get('projects', [AdminProjectController::class, 'index'])->name('projects.index');
        Route::get('projects/create', [AdminProjectController::class, 'create'])->name('projects.create');
        Route::post('projects', [AdminProjectController::class, 'store'])->name('projects.store');
        Route::get('projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
        Route::put('projects/{project}', [AdminProjectController::class, 'update'])->name('projects.update');
        Route::delete('projects/{project}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');

        // Testimonials
        Route::get('testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('testimonials/create', [AdminTestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('testimonials', [AdminTestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');

        // Clients / Brands
        Route::get('clients', [AdminClientController::class, 'index'])->name('clients.index');
        Route::get('clients/create', [AdminClientController::class, 'create'])->name('clients.create');
        Route::post('clients', [AdminClientController::class, 'store'])->name('clients.store');
        Route::get('clients/{client}/edit', [AdminClientController::class, 'edit'])->name('clients.edit');
        Route::put('clients/{client}', [AdminClientController::class, 'update'])->name('clients.update');
        Route::delete('clients/{client}', [AdminClientController::class, 'destroy'])->name('clients.destroy');

        // Enquiries
        Route::get('enquiries', [AdminEnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('enquiries/{enquiry}', [AdminEnquiryController::class, 'show'])->name('enquiries.show');
        Route::patch('enquiries/{enquiry}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.status');
        Route::delete('enquiries/{enquiry}', [AdminEnquiryController::class, 'destroy'])->name('enquiries.destroy');

        // Settings and account
        Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');
        Route::get('account', [AdminAccountController::class, 'edit'])->name('account.edit');
        Route::put('account', [AdminAccountController::class, 'update'])->name('account.update');
    });
});
