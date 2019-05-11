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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home-ads', 'HomeAdController@index')->name('home-ads.index');
//
//Route::get('/home-ads/{id}', 'HomeAdController@show')->name('home-ad-show');
//
//Route::get('/home-ads/create', 'HomeAdController@create')->name('home-ad-create');
//
////Route::post('/home-ads/create', function(App\Http\Requests\CreateHomeAdRequest $request){
////    //$newHomeAd = \App\HomeAd::create($request->only(['city']));
////    return view('home-ad-list');
////});
//
//Route::post('/home-ads', 'HomeAdController@store')->name('home-ads.store');

Route::resource('home-ads', 'HomeAdController');
