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

Route::group(['prefix' => 'manager','as' => 'manager.','middleware' => ['auth', 'ManagerOnly']], function () {

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@managerDashboard']);
    Route::resource('stores', 'StoresController');
    Route::post('stores/{store}/disable', ['as' => 'manager.stores.disable', 'uses' => 'StoresController@disable']);
    Route::post('stores/{store}/activate', ['as' => 'manager.stores.activate', 'uses' => 'StoresController@activate']);

    Route::resource('users', 'UsersController', ['except' => [
        'create', 'store', 'show'
    ]]);
    Route::post('users/{user}/disable', ['as' => 'manager.users.disable', 'uses' => 'UsersController@disable']);
    Route::post('users/{user}/activate', ['as' => 'manager.users.activate', 'uses' => 'UsersController@activate']);

    Route::resource('orders', 'OrdersController', ['except' => [
        'create', 'store', 'edit'
    ]]);

    Route::resource('sliders', 'SlidersController',  ['except' => [
        'show', 'update', 'edit'
    ]]);
    Route::post('sliders/{slide}/disable', ['as' => 'sliders.disable', 'uses' => 'SlidersController@disable']);
    Route::post('sliders/{slide}/activate', ['as' => 'sliders.activate', 'uses' => 'SlidersController@activate']);

    Route::resource('products', 'ProductsController');

});


/***************************************************************************************************
Store Admin ROUTES
 ***************************************************************************************************/

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => ['auth', 'StoreAdminOnly']], function () {

    Route::get('dashboard', 'DashboardController@adminDashboard');
    Route::resource('products', 'ProductsController');

});

Auth::logout();
/***************************************************************************************************
Front End ROUTES
 ***************************************************************************************************/
Route::group(['middleware' => ['web']], function () {

    Route::post('country/set','LocaleController@setCountry')->name('country.set');
    Route::post('area/set','LocaleController@setArea')->name('area.set');
    Route::get('locale/{locale}/set','LocaleController@setLocale')->name('locale.set');
    Route::get('product/{id}/{name}','ProductsController@show')->name('product.show');
    Route::post('product/{id}/favorite','ProductsController@favorite')->name('product.favorite');
    Route::post('cart/add','CartController@addItem')->name('cart.item.add');
    Route::get('cart/{id}/remove','CartController@removeItem')->name('cart.item.remove');
    Route::post('cart/update','CartController@update')->name('cart.update');
    Route::get('cart','CartController@index')->name('cart.index');
    Route::get('products','ProductsController@index')->name('products.index');
    Route::get('products/{category}','ProductsController@getProductsForCategory')->name('products.category.index');
    Route::get('area/select','LocaleController@selectArea')->name('area.select');
    Route::get('checkout','CheckoutController@index')->name('checkout');
    Auth::routes();
    Route::get('home','HomeController@index');
    Route::get('/', 'HomeController@index')->name('home');
});
