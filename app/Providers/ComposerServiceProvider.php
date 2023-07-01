<?php

namespace App\Providers;

use App\Product;
use App\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Load Categories in sidebar views
         */
        view()->composer('layouts.includes.side-bar', function ($view){

            $categories = Category::with('Products')->orderBy('name', 'asc')->get();
            return $view->with('categories', $categories);
        });

        /*
         * Load Recent Products in  sidebar views
         */
        view()->composer('layouts.includes.side-bar', function ($view){
            $recentProducts = Product::latestFirst()->take(4)->get();
            return $view->with('recent_Products', $recentProducts);
        });


    }
}
