<?php

namespace App\Providers;

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
        // Share contact information with all views
        view()->composer('*', function ($view) {
            $contactContent = \App\Models\SiteContent::where('page', 'contact')
                ->pluck('value', 'key');
            $view->with('contactContent', $contactContent);
        });
    }
}
