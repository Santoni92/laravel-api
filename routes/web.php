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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function(){
    Route::get('/','HomeController@index')->name('index');   //name('home')
    Route::resource('posts','PostController');
});

//da mettere in fondo al file web.php
Route::get("{any?}",function(){
    return view('guest.home');
    //return view('layouts.front-app');
})->where("any",".*");
