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
    //Dashboard Routes
    Route::resource('admin/home', 'HomeController');

    //Post Routes
    Route::resource('admin/post/post', 'PostController');

    //Tag Routes
    Route::resource('admin/tag/tag', 'TagController');

    //Category Routes
    Route::resource('admin/category/category', 'CategoryController');

    //User Routes
    Route::resource('admin/user', 'UserController');
});
