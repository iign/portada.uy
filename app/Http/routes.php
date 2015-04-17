<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/', 'HomeController@index');

Route::get('feed', 'FeedController@getNews');

Route::get('opciones', 'SettingsController@showSettings');

// Route::get('medio/{slug}', 'FeedController@showSingleFeed');

/* Admin routes */

Route::get('admin', 'AdminController@index');

Route::resource('admin/news', 'NewsItemController');
Route::resource('admin/feeds', 'FeedController');

Route::get('admin/fetch', 'FeedController@goFetch');
