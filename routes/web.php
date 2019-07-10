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

Route::get('/', function (Request $request) {
    return view("index",);
});

Route::get('/about', function (Request $request) {
    return view("about");
});

Route::get('/contact', function (Request $request) {
    return view("contact");
});

//CRUD
Route::middleware(['auth'])->group(function() {
    Route::get('/posts/admin', 'PostController@admin');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/show/{post}', 'PostController@show');

    Route::post('/posts', 'PostController@store');
    // Route::get('/posts/{post}', 'PostController@show');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@destroy');

    Route::get('/posts/{post}/edit', 'PostController@edit');

    Route::resource('/categories', 'CategoryController')->except(['show']);
});

Route::get('/posts', 'PostController@index');
Route::get('/posts/category/{category}', 'PostController@indexWithCategory');
Route::get('/posts/postUser/{post}', 'PostController@indexWithPostUser');
Route::get('/posts/{post}', 'PostController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
