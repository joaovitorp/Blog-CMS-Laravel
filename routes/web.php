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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{category}', 'HomeController@index')->name('category');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/project', 'ContactController@index')->name('project');
Route::get('/about', 'AboutController@index')->name('about');
Route::post('/contact', 'ContactController@store')->name('contact.send');
Route::get('/post/{id}-{title?}', 'Admin\\PostController@show')->name('view');


Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/login', 'adminAuth@index')->name('admin.auth');
    Route::post('/login', 'adminAuth@login')->name('admin.login');
    Route::middleware("auth")->group( function (){
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/blog', 'PostController@index')->name('admin.post');
        Route::get('/settings', 'SettingsController@index')->name('admin.setting');
        //profile
        Route::get('/profile', 'ProfileController@index')->name('admin.profile');
        Route::post('/profile', 'ProfileController@update')->name('admin.profile.update');
        //Adicionar
        Route::get('/blog/adicionar', 'PostController@create')->name('admin.post.add');
        Route::post('/blog/adicionar', 'PostController@store')->name('admin.post.post');
        //Editar
        Route::get('/blog/edit/{id}', 'PostController@edit')->name('admin.post.edit');
        Route::post('/blog/edit/{id}', 'PostController@update')->name('admin.post.update');
        //Delete
        Route::get('/blog/delete/{id}', 'PostController@destroy')->name('admin.post.del');
        Route::post('/blog/category/new', 'CategoryController@store')->name('admin.cat.new');
        //Manager
        Route::get('/user', 'UserController@index')->name('admin.user');
        Route::get('/user/add', 'UserController@create')->name('admin.user.add');
    });
});