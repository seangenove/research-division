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
Route::get('/aboutDiv', 'PublicController@aboutDiv');
Route::get('/about', 'PublicController@about');
Route::get('/monitorAndEval', 'PublicController@monitorAndEval');
Route::get('/resolutions', 'PublicController@resolutions');

Route::get('/public/showOrdinance/{id}', 'PublicController@showOrdinance');
Route::get('/public/showOrdinanceQuestionnaire/{id}', 'PublicController@showOrdinanceQuestionnaire');
Route::get('/public/showOrdinanceQuestionnaire/{id}/required', 'PublicController@showRequiredOrdinanceQuestionnaire');
Route::post('/submitOrdinanceAnswers/{id}', 'PublicController@submitOrdinanceAnswers');

Route::get('/public/showResolution/{id}', 'PublicController@showResolution');
Route::get('/public/showResolutionQuestionnaire/{id}', 'PublicController@showResolutionQuestionnaire');
Route::get('/public/showResolutionQuestionnaire/{id}/required', 'PublicController@showRequiredResolutionQuestionnaire');

Route::get('/reports', 'PublicController@reports');
Route::get('/page/{id}', 'PublicController@page');
Route::post('/suggestions/{id}', 'PublicController@storeSuggestion');
Route::get('/contactUs', 'PublicController@contactUs');

/* Admin routes */
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('/', 'Admin\\DashboardController@index');

    Route::get('change-password', 'Admin\\UsersController@changePassword');
    Route::post('update-password', 'Admin\\UsersController@updatePassword');

    /** Monitoring and Evaluation */
    Route::group(['middleware' => 'role:me,superadmin,admin'], function () {

        Route::group(['prefix' => 'forms'], function () {
            Route::get('ordinances', 'Admin\\FormsController@ordinancesIndex');
            Route::get('resolutions', 'Admin\\FormsController@resolutionsIndex');
        });
        Route::resource('forms', 'Admin\\FormsController');
        Route::post('/acceptResponses/{id}', 'Admin\\FormsController@acceptResponses');
        Route::post('/declineResponses/{id}', 'Admin\\FormsController@declineResponses');
        Route::group(['prefix' => 'result'], function () {
            Route::get('download/{id}', 'Admin\\ResultController@downloadExcel');
            Route::get('resolutions', 'Admin\\FormsController@resolutions');
        });
        Route::resource('result', 'Admin\\ResultController');
    });

    /** END --- Monitoring and Evaluation */

    /** Research and Records */
    Route::resources([
        'ordinances' => 'Admin\\OrdinancesController',
        'resolutions' => 'Admin\\ResolutionsController',
    ]);
    /** END --- Research and Records */

    // Routes ONLY for Super Admin
    Route::group(['middleware' => 'role:superadmin,admin'], function () {
        Route::resource('users', 'Admin\\UsersController');
        Route::resource('pages', 'Admin\\PagesController');
        Route::get('/reset-password/{user_id}/', 'Admin\\UsersController@resetPassword');
        Route::get('/logs', 'Admin\\LogsController@index');
    });

});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');