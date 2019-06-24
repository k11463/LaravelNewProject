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
    return view('posts.list');
});

Route::get('posts/{id}', function ($id) {
    return view('posts.show');
});