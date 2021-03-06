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
    return view('welcome');
});

Route::get('searchmainpage', function () {
    return view('content.search');
});


//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('home', 'HomeController@index')->name('home');
Route::resource('motor', 'MotorController')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);



Route::get('search','SearchController@getSearchData');

Route::post('searchdetails','SearchController@getSearchDisplay');

//Route::post('searchreturn','SearchController@getViewSearchReturn');

//Route::post('searchbikesreturn','SearchController@getViewSearchReturnDisplay');

Route::get('motor/{motor_id}','SearchController@getViewSearchReturnDisplay');



