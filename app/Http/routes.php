<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'PostController@index');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::group(['prefix' => 'posts'], function() {
        Route::get('', ['as' => 'admin.index', 'uses' => 'PostAdminController@index']);
        Route::get('create', ['as' => 'admin.posts.create', 'uses' => 'PostAdminController@create']);
        Route::post('store', ['as' => 'admin.posts.store', 'uses' => 'PostAdminController@store']);
        Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostAdminController@edit']);
        Route::post('update/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostAdminController@update']);
        Route::get('delete/{id}', ['as' => 'admin.posts.delete', 'uses' => 'PostAdminController@destroy']);
    });
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    //
});
