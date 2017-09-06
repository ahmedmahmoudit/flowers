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

Route::get('test',function() {

//    return Mail::to('z4ls@live.com');

    $data = ['name' =>"Virat Gandhi"];

    Mail::send(['text'=>'mail'], $data, function($message) {
        $message->to('z4ls@live.com', 'Tutorials Point')->subject
        ('Laravel Basic Testing Mail');
        $message->from('xyz@gmail.com','Virat Gandhi');
    });
    echo "Basic Email Sent. Check your inbox.";
});

Route::get('manager/login', function () {
    Auth::logout();
    Auth::loginUsingId(1);
    return redirect('manager/dashboard');
});

Route::get('admin/login', function () {
    Auth::logout();
    Auth::loginUsingId(2);
    return redirect('admin/dashboard');
});

/***************************************************************************************************
 * Manager ROUTES
 ***************************************************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'manager', 'as' => 'manager.', 'middleware' => ['auth', 'ManagerOnly']], function () {

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
    Route::post('orders/{order}/shipped', ['as' => 'orders.shipped', 'uses' => 'OrdersController@orderShipped']);
    Route::post('orders/{order}/completed', ['as' => 'orders.completed', 'uses' => 'OrdersController@orderCompleted']);
    Route::post('orders/{order}/cancelled', ['as' => 'orders.cancelled', 'uses' => 'OrdersController@orderCancelled']);

    Route::resource('sliders', 'SlidersController', ['except' => [
        'show', 'update', 'edit'
    ]]);
    Route::post('sliders/{slide}/disable', ['as' => 'sliders.disable', 'uses' => 'SlidersController@disable']);
    Route::post('sliders/{slide}/activate', ['as' => 'sliders.activate', 'uses' => 'SlidersController@activate']);

    Route::resource('categories', 'CategoriesController', ['except' => [
        'show'
    ]]);

    Route::resource('subcategories', 'SubCategoriesController', ['except' => [
        'show'
    ]]);

    Route::resource('ads', 'AdsController', ['except' => [
        'show', 'update', 'edit'
    ]]);

    Route::resource('coupons', 'CouponsController', ['except' => [
        'update', 'edit'
    ]]);
    Route::post('coupons/{coupon}/disable', ['as' => 'coupons.disable', 'uses' => 'CouponsController@disable']);
    Route::post('coupons/{coupon}/activate', ['as' => 'coupons.activate', 'uses' => 'CouponsController@activate']);

    Route::resource('products', 'ProductsController');
    Route::post('products/{product}/disable', ['as' => 'products.disable', 'uses' => 'ProductsController@disable']);
    Route::post('products/{product}/activate', ['as' => 'products.activate', 'uses' => 'ProductsController@activate']);
    Route::Delete('products/image/{image}', ['as' => 'products.image.destroy', 'uses' => 'ProductsController@destroyImage']);

    Route::get('verifications/products', ['as' => 'verifications.products', 'uses' => 'ProductsController@getAllWithVerifications']);
    Route::post('verifications/products/{product}/un-verify', ['as' => 'verifications.products.un-verify', 'uses' => 'ProductsController@unVerify']);
    Route::post('verifications/products/{product}/verify', ['as' => 'verifications.products.verify', 'uses' => 'ProductsController@verify']);
    Route::get('verifications/stores', ['as' => 'verifications.stores', 'uses' => 'StoresController@getAllWithVerifications']);
    Route::post('verifications/stores/{product}/un-verify', ['as' => 'verifications.stores.un-verify', 'uses' => 'StoresController@unVerify']);
    Route::post('verifications/stores/{product}/verify', ['as' => 'verifications.stores.verify', 'uses' => 'StoresController@verify']);

    Route::resource('newsletter', 'NewsletterController', ['except' => [
        'show'
    ]]);
    Route::get('newsletter/campaign', ['as' => 'newsletter.campaign', 'uses' => 'NewsletterController@campaignView']);
    Route::post('newsletter/campaign', ['as' => 'newsletter.campaign', 'uses' => 'NewsletterController@sendCampaign']);
    Route::get('newsletter/mail/stores', ['as' => 'newsletter.mailStores', 'uses' => 'NewsletterController@storesCampaignView']);
    Route::post('newsletter/mail/stores', ['as' => 'newsletter.mailStores', 'uses' => 'NewsletterController@sendStoresCampaign']);
    Route::post('newsletter/{newsletter}/disable', ['as' => 'newsletter.disable', 'uses' => 'NewsletterController@disable']);
    Route::post('newsletter/{newsletter}/activate', ['as' => 'newsletter.activate', 'uses' => 'NewsletterController@activate']);

    Route::get('pages/about', ['as' => 'pages.about.index', 'uses' => 'PageController@getAboutUs']);
    Route::post('pages/about', ['as' => 'pages.about.update', 'uses' => 'PageController@postAboutUs']);
    Route::get('pages/privacy', ['as' => 'pages.privacy.index', 'uses' => 'PageController@getPrivacy']);
    Route::post('pages/privacy', ['as' => 'pages.privacy.update', 'uses' => 'PageController@postPrivacy']);
    Route::get('pages/terms', ['as' => 'pages.terms.index', 'uses' => 'PageController@getTerms']);
    Route::post('pages/terms', ['as' => 'pages.terms.update', 'uses' => 'PageController@postTerms']);
    Route::get('pages/delivery', ['as' => 'pages.delivery.index', 'uses' => 'PageController@getDelivery']);
    Route::post('pages/delivery', ['as' => 'pages.delivery.update', 'uses' => 'PageController@postDelivery']);

    Route::get('pages/contact', ['as' => 'pages.contact.index', 'uses' => 'PageController@getContact']);
    Route::post('pages/contact', ['as' => 'pages.contact.update', 'uses' => 'PageController@postContactInfo']);

    Route::get('reports/sales', ['as' => 'reports.sales', 'uses' => 'ReportController@saleView']);
    Route::post('reports/sales', ['as' => 'reports.sales', 'uses' => 'ReportController@getSales']);

});


/***************************************************************************************************
 * Store Admin ROUTES
 ***************************************************************************************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'StoreAdminOnly']], function () {

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@adminDashboard']);

    Route::get('settings', ['as' => 'settings', 'uses' => 'StoresController@settings']);
    Route::post('settings', ['as' => 'settings.update', 'uses' => 'StoresController@settingsUpdate']);

    Route::get('areas', ['as' => 'areas', 'uses' => 'StoresController@showAreas']);
    Route::post('areas', ['as' => 'areas.update', 'uses' => 'StoresController@updateAreas']);

    Route::resource('products', 'ProductsController');
    Route::post('products/{product}/disable', ['as' => 'products.disable', 'uses' => 'ProductsController@disable']);
    Route::post('products/{product}/activate', ['as' => 'products.activate', 'uses' => 'ProductsController@activate']);
    Route::Delete('products/image/{image}', ['as' => 'products.image.destroy', 'uses' => 'ProductsController@destroyImage']);

    Route::resource('coupons', 'CouponsController', ['except' => [
        'show', 'update', 'edit'
    ]]);
    Route::post('coupons/{coupon}/disable', ['as' => 'coupons.disable', 'uses' => 'CouponsController@disable']);
    Route::post('coupons/{coupon}/activate', ['as' => 'coupons.activate', 'uses' => 'CouponsController@activate']);

    Route::resource('orders', 'OrdersController', ['except' => [
        'create', 'store', 'edit'
    ]]);
    Route::post('orders/{order}/shipped', ['as' => 'orders.shipped', 'uses' => 'OrdersController@orderShipped']);
    Route::post('orders/{order}/completed', ['as' => 'orders.completed', 'uses' => 'OrdersController@orderCompleted']);
    Route::post('orders/{order}/cancelled', ['as' => 'orders.cancelled', 'uses' => 'OrdersController@orderCancelled']);
});

/***************************************************************************************************
 * Front End ROUTES
 ***************************************************************************************************/
Route::group(['middleware' => ['web']], function () {

    Route::post('area/set', 'LocaleController@setArea')->name('area.set');
    Route::get('area/select', 'LocaleController@selectArea')->name('area.select');
    Route::get('order/{invoceid}/track', 'OrdersController@trackOrder')->name('order.track');

    Route::post('country/set', 'LocaleController@setCountry')->name('country.set');
    Route::get('country/{id}/areas', 'LocaleController@getCountryAreas')->name('country.areas');
    Route::get('locale/{locale}/set', 'LocaleController@setLocale')->name('locale.set');

    Route::get('page/{type}', 'PagesController@getPage')->name('page');
    Route::get('contact', 'PagesController@getContact')->name('contact');
    Route::post('contact', 'PagesController@postContact')->name('contact.post');
    Route::post('newsletter/subscribe', 'PagesController@postNewsletterSubscription')->name('newsletter.subscribe');
    Route::get('register/store', 'Auth\RegisterController@getStoreRegistrationForm')->name('register.store');

    Route::group(['middleware' => ['area']], function () {

        Route::get('products', 'ProductsController@index')->name('products.index');
        Route::get('products/top', 'ProductsController@bestSellers')->name('products.top');
        Route::get('product/{id}/{name}', 'ProductsController@show')->name('product.show');
        Route::post('product/{id}/favorite', 'ProductsController@favorite')->name('product.favorite');
        Route::get('category/{category}', 'ProductsController@getProductsForCategory')->name('category.index');
        Route::get('category/{category}/all', 'ProductsController@getAllProductsForCategory')->name('category.show');
        Route::get('products/search', 'ProductsController@searchProducts')->name('search');
        Route::get('stores', 'StoresController@index')->name('stores.index');
        Route::get('stores/{id}/{slug}', 'StoresController@show')->name('stores.show');
        Route::get('store/rate/{token}', 'StoresController@userRate')->name('store.rate');
        Route::post('stores/rate', 'StoresController@saveUserRate')->name('stores.rate');

        Route::post('cart/add', 'CartController@addItem')->name('cart.item.add');
        Route::get('cart/{id}/remove', 'CartController@removeItem')->name('cart.item.remove');
        Route::post('cart/update', 'CartController@update')->name('cart.update');
        Route::get('cart', 'CartController@index')->name('cart.index');
        Route::get('cart/checkout', 'CheckoutController@index')->name('checkout');
        Route::post('cart/checkout', 'CheckoutController@postCheckout')->name('checkout');
        Route::post('cart/coupon/apply', 'CouponsController@applyCoupon')->name('coupon.apply');

        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::get('profile/orders', 'ProfileController@getOrders')->name('profile.orders');
        Route::get('profile/orders/{id}/detail', 'ProfileController@getOrderDetail')->name('profile.orders.show');
        Route::get('profile/favorites', 'ProfileController@getFavorites')->name('profile.favorites');
        Route::get('logout', 'ProfileController@getLogout')->name('profile.logout');

        Route::get('payment/process', 'PaymentsController@processPayment');

        Route::get('home', 'HomeController@index')->name('home');
        Route::get('/', 'HomeController@index')->name('home');

    });

    Auth::routes();
});
