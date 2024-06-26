<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Admin Routes
    Route::group([
        'prefix' => 'tejassvi-panel',
        'as' => 'admin.'
    ], function () {
        Route::get('/login', 'LoginController@showLogin')->name('login');
        Route::post('/login', 'LoginController@doLogin');
        Route::get('/logout', 'LoginController@logout')->name('logout');

        Route::get('/site-setting', 'SiteController@create')->name('site.edit');
        Route::post('/site-setting', 'SiteController@store')->name('site.update');

        Route::group([
            'middleware' => 'admin'
        ], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');

            Route::delete('category/delete/{category}', 'CategoryController@deletePermanent')->name('category.delete');

            Route::delete('category/restore/{category}', 'CategoryController@restore')->name('category.restore');

            Route::get('product/price/{product}', 'ProductController@price')->name('product.price');
            Route::get('product/image/{product}', 'ProductController@image')->name('product.image');
            // Route::post('product/price/{product}', 'ProductController@storePrice')->name('product-price.store');

            // Route::get('product/price/{price}/edit', 'ProductController@editPrice')->name('product-price.edit');
            // Route::put('product/price/{price}', 'ProductController@updatePrice')->name('product-price.update');

            // Route::delete('product/price/{price}', 'ProductController@destroyPrice')->name('product-price.destroy');

            Route::resources([
                'category'          => 'CategoryController',
                'product'           => 'ProductController',
                'hsn'               => 'HsnController',
                'color'             => 'ColorController',
                'product'           => 'ProductController',
                'product-attribute' => 'ProductAttributeController',
                'product-image'     => 'ProductImageController',
                'ware-house'        => 'WareHouseController',
                'stock'             => 'StockController',
                'slider'             => 'SliderController'
            ]);
        });
    });

    // Web Routes
    Route::group(['namespace' => 'Web'], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('details/{product}', 'ProductController@show')->name('product.show');
        Route::get('cart', 'CartController@index')->name('cart.index');

        Route::get('{any}', 'PageController@show')->name('page.show');
        Route::get('{category}/{subcategory1?}/{subcategory2?}', 'ProductController@index')->name('product.index');
    });
});
