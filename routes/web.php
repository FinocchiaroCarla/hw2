<?php

use Illuminate\Support\Facades\Route;

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

Route::get('signup', 'App\Http\Controllers\LoginController@signup_form');
Route::post('signup', 'App\Http\Controllers\LoginController@do_signup');
Route::get('check_email/{email}', 'App\Http\Controllers\LoginController@check_email');
Route::get('check_username/{username}', 'App\Http\Controllers\LoginController@check_username'); //sia login che signup
Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('search_recipe/{recipe}', 'App\Http\Controllers\HomeController@search_recipe');
Route::get('save_recipe/{id_rec}', 'App\Http\Controllers\HomeController@save_recipe');
Route::get('select/{id_rec}', 'App\Http\Controllers\HomeController@select');

Route::get('like', 'App\Http\Controllers\LikeController@like');
Route::get('load', 'App\Http\Controllers\LikeController@load');
Route::get('remove/{element_id}', 'App\Http\Controllers\LikeController@delete');

Route::get('private', 'App\Http\Controllers\PrivateController@private');
Route::get('drop', 'App\Http\Controllers\PrivateController@drop');
Route::post('private', 'App\Http\Controllers\PrivateController@change');