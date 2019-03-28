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

Route::get('/', 'FormController@index');

Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    Route::get('/create', 'FormController@create');
   
    Route::post('/', 'FormController@store');
    Route::get('/{slug}/edit', 'FormController@edit');
    Route::put('/{id}', 'FormController@update');
    Route::delete('/{id}', 'FormController@destroy');
    Route::post('/tanggapi/{id}', 'FormResponseController@store');
});
// Route::get('/notif/notif', 'HomeController@notif');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slug}', 'FormController@singgle');

