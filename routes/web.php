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

Route::get('/', function () { return view('welcome');})->name('home');

Route::group(
[
    "prefix" => "news",
    "namespace" => "News",
    "as" => "news."
], function (){
    Route::get("/", 'NewsController@index')->name('index');
    Route::get("/{id}", 'NewsController@getNewsById')->where('id', '[0-9]+')->name('byId');
    Route::group(
        [
            "prefix" => "categories",
           // "namespace" => "",
            "as" => "categories."
        ], function (){
        Route::get("/", 'CategoryController@index')->name('index');
        Route::get("/{id}", 'CategoryController@getCategoryById')->name('byId');
    }
    );
}
);


