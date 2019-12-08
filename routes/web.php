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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome/filter', 'WelcomeController@filter');
Route::get('/welcome/sort', 'WelcomeController@sort');
Route::get('/welcome/search', 'WelcomeController@search');

Route::get('/cart', 'CartController@index');
Route::get('/cart/set_info', 'CartController@setInfo');
Route::post('/cart/pay', 'CartController@pay');

Route::get('/item/{item}/addToCart', 'CartController@add');
Route::get('/item/{item}/deleteFromCart', 'CartController@delete');
Route::get('/item/{item}', 'ItemController@show');

Route::get('/courier', 'CourierController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
