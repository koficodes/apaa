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
    return view('landing');
});

Auth::routes();

Route::get('/search', 'SearchController@index')->name('home');
Route::post('/search', 'SearchController@search')->name('search');
Route::get('/search/{categoryId}/category', 'SearchController@searchByCategory')->name('search.category');

Route::get('/logout', 'Auth\LoginController@logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('services', 'ServicesController');
    Route::resource('new-services', 'NewServiceRequestController');
    Route::get('/service/{serviceId}/like', 'ServicesController@like');
    Route::get('/service/{serviceId}/unlike', 'ServicesController@unlike');
    Route::post('/service/{serviceId}/addcomment', 'ServicesController@addComment');
});
