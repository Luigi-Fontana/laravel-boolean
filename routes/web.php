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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('pages', 'PageController');

Route::prefix('admin')
->namespace('Admin')
->name('admin.')
->middleware('auth')
->group(function (){
    Route::resource('pages', 'PageController');
    Route::resource('tags', 'TagController');
    Route::resource('photos', 'PhotoController');
    Route::resource('categories', 'CategoryController');
    Route::resource('users', 'UserController');
});
