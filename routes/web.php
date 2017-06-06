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

/***************************************************************************************************
                                         Manager ROUTES
 ***************************************************************************************************/

Route::group(['prefix' => 'manager','as' => 'manager','middleware' => ['auth', 'ManagerOnly']], function () {

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

});


/***************************************************************************************************
                                            Store Admin ROUTES
 ***************************************************************************************************/

Route::group(['prefix' => 'admin','as' => 'admin','middleware' => ['auth', 'StoreAdminOnly']], function () {

});

/***************************************************************************************************
Front End ROUTES
 ***************************************************************************************************/

Route::get('/',function(){
    return view('home');
})->name('home');

Route::post('country/set','LocaleController@setCountry')->name('country.set');
Route::post('area/set','LocaleController@setArea')->name('area.set');
Route::get('locale/{locale}/set','LocaleController@setLocale')->name('locale.set');

//Auth::routes();
Auth::routes();
//Route::get('login','Auth\LoginController@showLoginForm')->name('login.get');
//Route::post('login','Auth\LoginController@login')->name('login.post');
