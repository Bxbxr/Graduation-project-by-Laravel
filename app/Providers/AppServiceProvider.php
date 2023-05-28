<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.main', 'App\Http\ViewComposers\PageComposer');
        View::composer('partials.majors-list', 'App\Http\ViewComposers\MajorComposer');
        View::composer('profiles.show', 'App\Http\ViewComposers\PlatformPageComposer');

    }
}
