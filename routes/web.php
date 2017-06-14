<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    return 'login page';
});

Route::get('manager/login', function () {
    Auth::loginUsingId(1);
    return redirect('manager/dashboard');
});

Route::get('admin/login', function () {
    Auth::loginUsingId(2);
    return redirect('admin/dashboard');
});

/***************************************************************************************************
Manager ROUTES
 ***************************************************************************************************/

Route::group(['namespace' => 'Admin','prefix' => 'manager','as' => 'manager.','middleware' => ['auth', 'ManagerOnly']], function () {

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@managerDashboard']);
    Route::resource('stores', 'StoresController');
    Route::post('stores/{store}/disable', ['as' => 'stores.disable', 'uses' => 'StoresController@disable']);
    Route::post('stores/{store}/activate', ['as' => 'stores.activate', 'uses' => 'StoresController@activate']);

    Route::get('areas/{countryId}', ['as' => 'country.areas', 'uses' => 'CountriesController@getAreas']);

    Route::resource('users', 'UsersController', ['except' => [
        'create', 'store', 'show'
    ]]);
    Route::post('users/{user}/disable', ['as' => 'users.disable', 'uses' => 'UsersController@disable']);
    Route::post('users/{user}/activate', ['as' => 'users.activate', 'uses' => 'UsersController@activate']);

    Route::resource('orders', 'OrdersController', ['except' => [
        'create', 'store', 'edit'
    ]]);

    Route::resource('sliders', 'SlidersController',  ['except' => [
        'show', 'update', 'edit'
    ]]);
    Route::post('sliders/{slide}/disable', ['as' => 'sliders.disable', 'uses' => 'SlidersController@disable']);
    Route::post('sliders/{slide}/activate', ['as' => 'sliders.activate', 'uses' => 'SlidersController@activate']);

    Route::resource('coupons', 'CouponsController',  ['except' => [
        'update', 'edit'
    ]]);
    Route::post('coupons/{coupon}/disable', ['as' => 'coupons.disable', 'uses' => 'CouponsController@disable']);
    Route::post('coupons/{coupon}/activate', ['as' => 'coupons.activate', 'uses' => 'CouponsController@activate']);

    Route::resource('products', 'ProductsController');
    Route::post('products/{product}/disable', ['as' => 'products.disable', 'uses' => 'ProductsController@disable']);
    Route::post('products/{product}/activate', ['as' => 'products.activate', 'uses' => 'ProductsController@activate']);
    Route::Delete('products/image/{image}', ['as' => 'products.image.destroy', 'uses' => 'ProductsController@destroyImage']);

    Route::resource('newsletter', 'NewsletterController',  ['except' => [
        'show'
    ]]);
    Route::get('newsletter/campaign', ['as' => 'newsletter.campaign', 'uses' => 'NewsletterController@campaignView']);
    Route::post('newsletter/campaign', ['as' => 'newsletter.campaign', 'uses' => 'NewsletterController@sendCampaign']);
    Route::post('newsletter/{newsletter}/disable', ['as' => 'newsletter.disable', 'uses' => 'NewsletterController@disable']);
    Route::post('newsletter/{newsletter}/activate', ['as' => 'newsletter.activate', 'uses' => 'NewsletterController@activate']);

});


/***************************************************************************************************
Store Admin ROUTES
 ***************************************************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','as' => 'admin.','middleware' => ['auth', 'StoreAdminOnly']], function () {
    Route::get('dashboard', 'DashboardController@adminDashboard');
    Route::resource('products', 'ProductsController');

    Route::resource('coupons', 'CouponsController',  ['except' => [
        'show', 'update', 'edit'
    ]]);
    Route::post('coupons/{coupon}/disable', ['as' => 'coupons.disable', 'uses' => 'CouponsController@disable']);
    Route::post('coupons/{coupon}/activate', ['as' => 'coupons.activate', 'uses' => 'CouponsController@activate']);

    Route::resource('orders', 'OrdersController', ['except' => [
        'create', 'store', 'edit'
    ]]);
});

//Auth::logout();
/***************************************************************************************************
Front End ROUTES
 ***************************************************************************************************/
Route::group(['middleware' => ['web']], function () {

    Route::get('products','ProductsController@index')->name('products.index');
    Route::get('product/{id}/{name}','ProductsController@show')->name('product.show');
    Route::post('product/{id}/favorite','ProductsController@favorite')->name('product.favorite');
    Route::get('category/{category}','ProductsController@getProductsForCategory')->name('category.index');
    Route::get('category/{category}/all','ProductsController@getAllProductsForCategory')->name('category.show');
    Route::get('products/search','ProductsController@searchProducts')->name('search');
    Route::post('country/set','LocaleController@setCountry')->name('country.set');
    Route::get('stores','StoresController@index')->name('stores.index');
    Route::get('stores/{slug}','StoresController@show')->name('stores.show');
    Route::post('area/set','LocaleController@setArea')->name('area.set');
    Route::get('locale/{locale}/set','LocaleController@setLocale')->name('locale.set');
    Route::post('cart/add','CartController@addItem')->name('cart.item.add');
    Route::get('cart/{id}/remove','CartController@removeItem')->name('cart.item.remove');
    Route::post('cart/update','CartController@update')->name('cart.update');
    Route::get('cart','CartController@index')->name('cart.index');
    Route::get('cart/checkout','CheckoutController@index')->name('checkout');
    Route::get('area/select','LocaleController@selectArea')->name('area.select');

    Route::get('profile','ProfileController@index')->name('profile');
    Route::get('profile/edit','ProfileController@edit')->name('profile.edit');
    Route::get('profile/orders','ProfileController@getOrders')->name('profile.orders');
    Route::get('profile/orders/{id}','ProfileController@getOrderDetail')->name('profile.orders.show');
    Route::get('profile/favorites','ProfileController@getFavorites')->name('profile.favorites');
    Route::get('logout','ProfileController@getLogout')->name('profile.logout');

    Route::get('home','HomeController@index');
    Route::get('/', 'HomeController@index')->name('home');
    Auth::routes();
});
