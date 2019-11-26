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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User Routes
// Grouping Routes
Route::group(['namespace' => 'User'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('post/{post}', 'PostController@post')->name('blog_post');
    // ->name only defines the name of route for the url purpose

    Route::get('post/tag/{tag}', 'HomeController@tag')->name('blog_tags');
    Route::get('post/category/{category}', 'HomeController@category')->name('blog_category');
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

    //Role Routes
    Route::resource('admin/role', 'RoleController');

    //Permission Routes
    Route::resource('admin/permission', 'PermissionController');

    //Admin Auth
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});
