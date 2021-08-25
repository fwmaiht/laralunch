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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'lunch', 'middleware' => 'auth'], function() {
    Route::get('index', 'LunchListController@index')->name('lunch.index');
    Route::get('create', 'LunchListController@create')->name('lunch.create');
    Route::post('store', 'LunchListController@store')->name('lunch.store');
    Route::get('show/{id}', 'LunchListController@show')->name('lunch.show');
    Route::get('edit/{id}', 'LunchListController@edit')->name('lunch.edit');
    Route::post('update/{id}', 'LunchListController@update')->name('lunch.update');
    Route::post('destroy/{id}', 'LunchListController@destroy')->name('lunch.destroy');
});

Route::group(['prefix' => 'comment', 'middleware' => 'auth'], function() {
    Route::post('store/{id}', 'CommentController@store')->name('comment.store');
    Route::post('destroy/{id}', 'CommentController@destroy')->name('comment.destroy');
});

Route::group(['prefix' => 'reply', 'middleware' => 'auth'], function() {
    Route::get('nice/{post}', 'NiceController@store')->name('reply.nice');
    Route::get('unnice/{post}', 'NiceController@destroy')->name('reply.unnice');
    Route::get('countnices/{post}', 'NiceController@count')->name('reply.countnices');
    Route::get('hasnice/{post}', 'NiceController@hasnice')->name('reply.hasnice');
});
