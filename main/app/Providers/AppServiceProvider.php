<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Build every URL (site, assets, sitemap, admin) from APP_URL.
        $appUrl = rtrim((string) config('app.url'), '/');
        if ($appUrl !== '' && !$this->app->runningInConsole()) {
            // If APP_URL has no sub-folder (e.g. https://temax.in) but the site is
            // served from one (e.g. /ktg), keep the real base path.
            if ((string) parse_url($appUrl, PHP_URL_PATH) === '') {
                $appUrl .= request()->getBasePath();
            }
            URL::forceRootUrl($appUrl);
            if (str_starts_with($appUrl, 'https://')) {
                URL::forceScheme('https');
            }
        }

        // Cache-busting for theme assets.
        View::share('assetVersion', 'temax7');
    }
}
