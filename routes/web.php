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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home-ad-list', ['homes' => DB::table('home_ads')->paginate(10)]);
});

Auth::routes();

// Dashboard of authenticated user
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/ads', 'HomeController@userAds')->name('home-user-ads');


// https://laravel.com/docs/5.8/controllers
Route::resource('home-ads', 'HomeAdController');
