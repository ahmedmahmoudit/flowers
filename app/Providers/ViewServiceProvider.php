<?php

namespace App\Providers;

use App\Http\Composers\AppGlobals;
use App\Http\Composers\Header;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.master', AppGlobals::class
        );

        view()->composer(
            'partials.header', Header::class
        );

//        view()->composer(
//            'home', Header::class
//        );
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {

    }

}
