<?php

namespace App\Providers;

use App\Voyager\FormFields\JsonOneFieldOptionFormField;
use App\Voyager\FormFields\JsonTwoFieldOptionFormField;
use CloudCreativity\LaravelJsonApi\LaravelJsonApi;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**s
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
