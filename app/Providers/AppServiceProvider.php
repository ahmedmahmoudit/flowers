<?php

namespace App\Providers;

use App\Country;
use App\Repositories\AdRepository;
use App\Repositories\AdRepositoryInterface;
use App\Repositories\CouponRepository;
use App\Repositories\CouponRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\SliderRepository;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\StoreRepository;
use App\Repositories\StoreRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Store;
use Cache;
use Illuminate\Support\ServiceProvider;
use IZaL\Tap\Billing;
use IZaL\Tap\TapBilling;
use Laravel\Dusk\DuskServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//
        $this->app->bind(Billing::class, TapBilling::class);
//
        $options = [
            'ApiKey' => env('BILLING_API_KEY'),
            'UserName' => env('BILLING_USERNAME'),
            'Password' => env('BILLING_PASSWORD'),
            'MerchantID' => env('BILLING_MERCHANT_ID'),
        ];

        $this->app->bind(TapBilling::class,function() use ($options) {
            return new TapBilling($options);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Binding Repositories
        $this->app->singleton(StoreRepositoryInterface::class, StoreRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->singleton(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->singleton(AdRepositoryInterface::class, AdRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(CouponRepositoryInterface::class, CouponRepository::class);


        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
            $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
            $this->app->register(DuskServiceProvider::class);

        }
    }
}
