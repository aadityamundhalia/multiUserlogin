<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('/test', 'PaymentController@test');

//Auth::routes();

Route::group(['middleware' => 'web'], function(){
  Route::auth();
  Route::resource('/home', 'HomeController');
  Route::group(['prefix' => 'admin'], function() {
    Route::resource('/user', 'UserController');
    //Route::post('/storeData', 'UserController@storeData');
    //Route::resource('/create', 'UserController@create');
    //Route::post('/store', 'UserController@create');
    Route::resource('/post', 'PostController');
    Route::resource('/role', 'RoleController');
    Route::resource('/permission', 'PermissionController');
    Route::resource('/attachPermission', 'PermissionController@create');
    Route::post('/attach', 'PermissionController@attach');
  });
});
