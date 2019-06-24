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

Route::get('posts', function () {
    $posts = [1, 2, 3, 4, 5];
    return view('posts.list', ['posts' => $posts]);
});

Route::get('posts/{id}', function ($id) {
    return view('posts.show');
});