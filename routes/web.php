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


/* Public routes */
Route::get('/', 'PublicController@index');
Route::get('/ordinances', 'PublicController@ordinance');

// temporary
Route::get('/contactUs', 'PublicController@contactUs');

/* Admin routes */
Route::prefix('admin')->group(function () {

    // Dashboard Routes
    Route::get('/', 'Admin\\DashboardController@index');
    Route::resource('/forms', 'Admin\\FormsController');
    Route::resource('/users', 'Admin\\UsersController');
    Route::get('/logs', 'Admin\\LogsController@index'); // Lacking: Pagination, IP Address dynamic
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
