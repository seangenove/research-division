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
Route::get('/index', function () {
    return view('/public/index');
});
Route::get('/public/ordinance', function () {
    return view('/public/ordinance');
});
Route::get('/public/contactUs', function () {
    return view('/public/contactUs');
});
Route::get('/public/showOrdinance', function () {
    return view('/public/showOrdinance');
});

Route::get('/admin/ordinances/index', function () {
    return view('/admin/ordinances/index');
});

Route::get('/admin/ordinances/edit', function () {
    return view('/admin/ordinances/edit');
});

Route::prefix('admin')->group(function () {

    // Dashboard Routes
    Route::get('/', 'Admin\\DashboardController@index');

    // Forms
    Route::resource('forms', 'Admin\\FormsController');
});


Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
