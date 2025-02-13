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

Auth::routes(['verify' => true]);
Route::group(['middleware'=>'verified'], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('refreshcaptcha', 'Auth\RegisterController@refreshCaptcha');
Route::resource('user', 'UserController');
});
