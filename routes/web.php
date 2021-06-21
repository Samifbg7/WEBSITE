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

Route::get('/', 'Landingpage\IndexController@index')->name('landingpage.index');
Route::get('/login','Auth\LoginController@index')->name('login.index');
Route::post('/login','Auth\LoginController@index')->name('login.submit');

Route::prefix('admin')->name('dashboard.')->group(function (){
    Route::get('/','Dashboard\IndexController@index')->name('index');
    //user route
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('/','Dashboard\Users\UserController@index')->name('index');
        Route::get('/create','Dashboard\Users\UserController@create')->name('create');
        Route::post('/store','Dashboard\Users\UserController@store')->name('store');
    });
});



