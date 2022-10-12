<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    const HEADER_MENU_ACTIVE_CLASS = 'menu-link__active';

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
        Paginator::useBootstrap();

        $this->activeLinks();
    }

    public function activeLinks()
    {
        View::composer('layouts.app', function($view) {
            $view->with('mainLink', request()->is('/') ? self::HEADER_MENU_ACTIVE_CLASS : '');
            $view->with('articleLink', in_array(Route::current()->getName(), ['article.index', 'article.show']) ? self::HEADER_MENU_ACTIVE_CLASS : '');
        });
    }
}
