<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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
//landigpages

Route::get('/', 'Landingpage\MainController@index')->name('landingpage.home');
//login
Route::get('/login', 'Auth\LoginController@index')->name('login.index');
Route::post('/login', 'Auth\LoginController@authenticate')->name('login.authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//Reset password
// -----------------------------forget password ------------------------------
Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail')->name('forget-password');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail')->name('forget-password');
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');
//admin
Route::prefix('admin')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', 'Dashboard\IndexController@index')->name('index');
    //user route
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', 'Dashboard\Users\UserController@index')->name('index');
        Route::get('/create', 'Dashboard\Users\UserController@create')->name('create');
        Route::post('/store', 'Dashboard\Users\UserController@store')->name('store');
        Route::get('/edit/{id}', 'Dashboard\Users\UserController@edit')->name('edit');
        Route::get('/show/{id}', 'Dashboard\Users\UserController@show')->name('show');
        Route::post('/edit', 'Dashboard\Users\UserController@update')->name('update');
        Route::DELETE('/delete', 'Dashboard\Users\UserController@destroy')->name('delete');
    });
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', 'Dashboard\Posts\PostController@index')->name('index');
        Route::get('/create', 'Dashboard\Posts\PostController@create')->name('create');
        Route::post('/store', 'Dashboard\Posts\PostController@store')->name('store');
        Route::get('/edit/{id}', 'Dashboard\Posts\PostController@edit')->name('edit');
        Route::get('/show/{id}', 'Dashboard\Posts\PostController@show')->name('show');
        Route::post('/edit', 'Dashboard\Posts\PostController@update')->name('update');
        Route::DELETE('/delete', 'Dashboard\Posts\PostController@destroy')->name('delete');
    });
});



