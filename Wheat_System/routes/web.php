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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Messages.
Route::resource('messages', 'MessageController');
Route::get('/message', 'MessageController@store');
Route::get('/messages', 'MessageController@index');
Route::get('/message/{message}', 'MessageController@destroy');

// Profile Page
/*
Route::resource('/profile', 'ProfileController');
Route::get('/profile/{profile}/edit', 'ProfileController@edit');
Route::get('/profile/{profile}', 'ProfileController@update');
*/