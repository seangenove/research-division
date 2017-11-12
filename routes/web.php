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



/* Layout files */
Route::get('/', function () {
    return view('layouts.public');
});


Route::prefix('admin')->group(function () {

    // Dashboard Routes
    Route::get('/', 'Admin\\DashboardController@index');

    Route::get('/', 'Admin\\DashboardController@index');

});


Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
