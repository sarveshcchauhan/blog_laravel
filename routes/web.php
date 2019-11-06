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

// User Routes
// Grouping Routes
Route::group(['namespace' => 'User'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('post', 'PostController@index')->name('blog_post');
    // ->name only defines the name of route for the url purpose
});

//Admin Routes
Route::group(['namespace' => 'Admin'], function () {
    Route::get('admin/home', 'HomeController@index')->name('admin/home');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/category', 'ACategoryController');
});
