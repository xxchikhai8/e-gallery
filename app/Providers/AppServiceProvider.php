<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\IndexController;


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
        Artisan::call('view:clear');
        view()->composer('layouts.layout', function($view) {
            $view->with('tags', \App\Models\Tag::select('tag_name')->orderBy('tag_name', 'asc')->get());
        });
        Paginator::defaultView('vendor/pagination/bs5');
    }
}
