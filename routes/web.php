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

Route::get('/', 'LinksController@index')->name('home')->middleware('auth');
Route::get('/home', 'LinksController@index')->name('home')->middleware('auth');

Route::get('/manuales/laravel', 'LinksController@laravel')->middleware('forbidden');
Route::get('/manuales/javascript', 'LinksController@javascript')->middleware('forbidden');

Route::get('/manuales/javascript/{clase}', 'LinksController@javascript')->middleware('forbidden');
Route::get('/manuales/conectemos', 'LinksController@conectemos')->middleware('forbidden');

Route::get('/forbidden', 'LinksController@forbiddenPage');

Route::post('/forbidden', 'LinksController@forbidden');


Route::get('/test', function() {
    return view('test');
});
Auth::routes();
