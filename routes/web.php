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
<<<<<<< HEAD
    Route::resource('/forms', 'Admin\\FormsController');
    Route::resource('/users', 'Admin\\UsersController'); // Lacking: Validations, Logs
    Route::get('/logs', 'Admin\\LogsController@index'); // Lacking: Pagination, IP Address dynamic
    Route::resource('/ordinances', 'Admin\\OrdinancesController');
    Route::resource('/pages', 'Admin\\PagesController');

=======
    Route::get('/logs', 'Admin\\LogsController@index'); // TODO: Pagination, IP Address dynamic
    Route::resources([
        'forms' => 'Admin\\FormsController',
        'users' => 'Admin\\UsersController', // TODO: Validations, Logs
        'ordinances' => 'Admin\\OrdinancesController', // TODO: Validations, Logs
        'pages' => 'Admin\\PagesController' // TODO: Validations, Logs
    ]);
>>>>>>> 4fdc6cc9f80ccf4390b5cd543e1132adf2bbc2f3
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/forms/edit', 'Admin\\QuestionnaireController');