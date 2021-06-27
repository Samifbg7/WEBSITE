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
//landigpages

Route::get('/', 'Landingpage\MainController@index')->name('landingpage.home');

//login
Route::get('/login','Auth\LoginController@index')->name('login.index');
Route::post('/login','Auth\LoginController@authenticate')->name('login.authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
//admin
Route::prefix('admin')->name('dashboard.')->middleware('auth')->group(function (){
    Route::get('/','Dashboard\IndexController@index')->name('index');
    //user route
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('/','Dashboard\Users\UserController@index')->name('index');
        Route::get('/create','Dashboard\Users\UserController@create')->name('create');
        Route::post('/store','Dashboard\Users\UserController@store')->name('store');
        Route::get('/edit/{id}','Dashboard\Users\UserController@edit')->name('edit');
        Route::get('/show/{id}','Dashboard\Users\UserController@show')->name('show');
        Route::post('/edit','Dashboard\Users\UserController@update')->name('update');
        Route::post('/delete','Dashboard\Users\UserController@destroy')->name('delete');
    });
});



