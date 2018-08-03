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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/manager', 'FeedbackFormController@roleManager')->middleware('auth');

Route::get('/user', 'FeedbackFormController@roleUser')->middleware('auth');

Route::post('/success', 'FeedbackFormController@success')->middleware('auth');

Route::post('/manager', 'FeedbackFormController@managerCheckboxes')->middleware('auth');

