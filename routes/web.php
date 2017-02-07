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
Route::group(['middleware' => 'web'], function () {

	Route::get('/',[
		'uses'=> '\App\Http\Controllers\HomeController@index',
		'as'=>'home'
		]);

	Route::post('/signup',[
		'uses'=> '\App\Http\Controllers\HomeController@postSubmit',
		'as'=>'auth.proceed'
		]);
	Route::post('/signin',[
		'uses'=> '\App\Http\Controllers\HomeController@postSubmit',
		'as'=>'auth.proceed'
		]);

	Route::get('/view/a={app_id}/d={dev_id}',[
		'uses'=> '\App\Http\Controllers\AdController@getView',
		'as'=>'ad.demo',
		'attempt'=>'10'
	]);

	Route::get('/click/a={app_id}/d={dev_id}/',[
		'uses'=> '\App\Http\Controllers\AdController@getClick',
		'as'=>'ad.demo',
	]);

	Route::get('/signout',[
		'uses' => '\App\Http\Controllers\AuthController@getSignOut',
		'as' => 'auth.signout'
	]);

	Route::get('/advertiser/newad',[
		'uses'=>'\App\Http\Controllers\AdController@getAdvertiser',
		'as'=> 'ad.advertise'
		]);

	Route::get('/developer/newapp',[
		'uses'=>'\App\Http\Controllers\AppController@getNewApp',
		'as'=> 'app.new'
		]);

});