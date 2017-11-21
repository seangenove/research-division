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
/*Route::get(function ($id){
    $ordinance = Ordinance::findOrFail($id);
    return view('public.ordinance', compact($ordinance));
});*/

Route::get('/aboutDiv', 'PublicController@aboutDiv');
Route::get('/about', 'PublicController@about');
Route::get('/monitorAndEval', 'PublicController@monitorAndEval');
Route::get('/resolutions', 'PublicController@resolutions');

Route::get('/showOrdinance/{id}', 'PublicController@showOrdinance');
Route::get('/public/showResolution/{id}', 'PublicController@showResolution');
Route::get('/reports', 'PublicController@reports');

/*Route::get(function ($id){
    $ordinance = Ordinance::findOrFail($id);
    return view('public.showOrdinance', compact($ordinance));
});*/

// temporary
Route::get('/contactUs', 'PublicController@contactUs');
Route::view('/admin/forms/test', 'forms.test');

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