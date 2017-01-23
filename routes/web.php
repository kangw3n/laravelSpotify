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

	Route::get('/', ['uses' => 'MainController@searchController']);
	Route::get('/about', ['uses' => 'MainController@aboutController']);
	Route::get('/track/{id}', ['uses' => 'MainController@trackController']);
	Route::get('/artist/{id}', ['uses' => 'MainController@artistController']);
	Route::get('/album/{id}', ['uses' => 'MainController@albumController']);
	Route::get('/top-tracks/{id}', ['uses' => 'MainController@topTrackController']);


	Auth::routes();
