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


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
    function()
{
    //Головна сторінка сайту
    Route::get('/', 'ClockController@mainPage')->name('main');
    Route::get('/shop', 'ClockController@shopPage')->name('shop');
    Route::get('/shop/{id}', 'ClockController@show');

    // Localization in Vue
    Route::get('/js/lang.js', 'LocalizationController@getLocalizationFile')->name('assets.lang');
});


Route::get('filter', 'ClockController@filter')->name('filter');
Route::post('orders', 'OrderController@story')->name('new-order');
Route::post('feedbacks', 'FeedbackController@story')->name('new-feedback');
Route::post('cart/add', ['uses' => 'ClockController@addToCart', 'as' => 'addToCart']);
Route::post('cart/update', ['uses' => 'ClockController@updateCart', 'as' => 'updateCart']);
Route::post('cart/remove', ['uses' => 'ClockController@removeFromCart', 'as' => 'removeFromCart']);
Route::get('cart', ['uses' => 'ClockController@getCart', 'as' => 'getCart']);
Route::get('checkout', ['uses' => 'OrderController@create', 'as' => 'checkout']);


Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'AdminController@index');

    Route::put('clocks/{id}/update', 'ClockController@updateFromTable');
    Route::delete('clocks/{id}/destroy', 'ClockController@destroyFromTable');
    Route::post('clocks/images/set-logo/{id}', 'ClockController@setLogo');
    Route::post('clocks/images/{id}', 'ClockController@loadImages');
    Route::delete('clocks/images/{id}', 'ClockController@deleteImage');
    Route::put('clocks/descriptions/{id}', 'ClockController@setDescriptions');
    Route::post('clocks/descriptions/{id}', 'ClockController@getDescriptions');
    Route::put('clocks/characteristics/{id}', 'ClockController@setCharacteristics');
    Route::post('clocks/characteristics/{id}', 'ClockController@getCharacteristics');
    Route::resource('clocks', 'ClockController');

    Route::get('orders/old', 'OrderController@oldOrders');
    Route::resource('orders', 'OrderController');

    Route::get('feedbacks/old', 'FeedbackController@oldFeedbacks');
    Route::resource('feedbacks', 'FeedbackController');



});

Route::get('/home', 'HomeController@index')->name('home');



