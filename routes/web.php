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
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('product/{category}/{subcategory1?}/{subcategory2?}', 'ProductController@index')->name('product.index');
    Route::get('details/{product}', 'ProductController@show')->name('product.show');
});
