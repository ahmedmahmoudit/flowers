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

Route::get('image', function()
{
    $img = Image::make('https://www.oushop.com/warp_sites/oushop.g6/files/Shop2.jpg')->resize(300, 200);

    return $img->response('jpg');
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