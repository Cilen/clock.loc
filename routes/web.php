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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    //Головна сторінка сайту
    Route::get('/', 'ClockController@main');

//    Route::get('lang',function(){
//        return view('lang');
//    });
});

Route::post('orders', 'OrderController@story')->name('new-order');
Route::post('feedbacks', 'FeedbackController@story')->name('new-feedback');


Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'AdminController@index');

    Route::post('test', 'ClockController@test');
    Route::put('clocks/descriptions/{id}', 'ClockController@setDescriptions');
    Route::post('clocks/descriptions/{id}', 'ClockController@getDescriptions');
    Route::resource('clocks', 'ClockController');

    Route::get('orders/old', 'OrderController@oldOrders');
    Route::resource('orders', 'OrderController');

    Route::get('feedbacks/old', 'FeedbackController@oldFeedbacks');
    Route::resource('feedbacks', 'FeedbackController');



});

Route::get('/home', 'HomeController@index')->name('home');
