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


//Route::get('/manager', 'Auth\LoginController@redirectTo');

Route::get('/manager', 'Auth\LoginController@roleManager');

Route::get('/user', 'Auth\LoginController@roleUser');

Route::post('/success', 'Auth\LoginController@success');



/*
Route::get('/manager', function () {

    // return view('manager', compact('user'));
    return view('manager');

})->middleware('auth');*/


