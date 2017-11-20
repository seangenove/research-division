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
Route::get('/ordinance', 'PublicController@ordinance');
Route::get('/aboutDiv', 'PublicController@aboutDiv');
Route::get('/about', 'PublicController@about');
Route::get('/monitorAndEval', 'PublicController@monitorAndEval');
Route::get('/resolution', 'PublicController@resolution');
Route::get('/reports', 'PublicController@reports');
// temporary
Route::get('/contactUs', 'PublicController@contactUs');

/* Admin routes */
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'],function () {
    Route::get('/', 'Admin\\DashboardController@index');

    Route::get('/logs', 'Admin\\LogsController@index'); // TODO: Pagination, IP Address dynamic
    /** TODO:  Logs, Parsley, back-end validation and flash **/
    Route::get('change-password', 'Admin\\UsersController@changePassword');
    Route::post('update-password', 'Admin\\UsersController@updatePassword'); //
    Route::resources([
        'forms' => 'Admin\\FormsController',
        'users' => 'Admin\\UsersController', // TODO: Validations, Logs, Re-enter Password (Parsley.js)
        'ordinances' => 'Admin\\OrdinancesController', // TODO: Validations, Logs
        'pages' => 'Admin\\PagesController', // TODO: Validations, Logs
        'resolutions' => 'Admin\\ResolutionsController' // TODO: Validations, Logs
    ]);

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');