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

Route::post('new-order', 'OrderController@story')->name('new-order');
Route::post('new-feedback', 'FeedbackController@story')->name('new-feedback');


Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'AdminController@index');

    Route::get('clocks', 'ClockController@index'); //Таблиця зі всіма годинниками
    Route::get('create-clock', 'ClockController@create');
    Route::get('update-clock', 'ClockController@update');
    Route::get('clocks', 'ClockController@store'); //Отримання даних з форми і створення моделі
    Route::get('clocks{clockId}', 'ClockController@show'); //Отримання даних з форми і створення моделі

    Route::get('new-orders', 'OrderController@index');
    Route::get('old-orders', 'OrderController@oldOrders');
    Route::get('orders/{idOrder}', 'OrderController@show');
    Route::patch('orders/{idOrder}', 'OrderController@update');

    Route::get('new-feedback', 'FeedbackController@index');
    Route::get('old-Feedback', 'FeedbackController@oldFeedback');
    Route::patch('feedback/{idFeedback}', 'FeedbackController@update');


});

Route::get('/home', 'HomeController@index')->name('home');
