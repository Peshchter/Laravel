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
Route::resource('news', 'News\NewsController')->only(['edit', 'destroy', 'update', 'index']);
Route::group(
[
    "prefix" => "news",
    "namespace" => "News",
    "as" => "news."
], function (){
    //Route::get("/", 'NewsController@index')->name('index');
    Route::get("/add", 'NewsController@add')->name('add');
    Route::get("/parser", 'ParserController@index')->middleware('auth')->name('parser');
    Route::get("/parser/save", 'ParserController@save')->middleware('auth')->name('parser.save');
    Route::post("/add", 'NewsController@save')->name('save');
    Route::get("/get", 'NewsController@get')->name('get');
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

Auth::routes();
Route::get('/users','UsersController@index')->middleware(['auth', 'checkAdmin'])->name('users');
Route::get('/users/{user}','UsersController@edit')->middleware(['auth'])->name('user.edit');
Route::patch('/users/{user}','UsersController@update')->middleware(['auth'])->name('user.update');
Route::patch('/users/{user}/toggle','UsersController@toggleAdmin')->middleware(['auth', 'checkAdmin'])->name('users.toggle');
Route::get('/response/vk', 'Auth\SocialLoginController@responseVK')->name('response.vk');
Route::get('/login/vk', 'Auth\SocialLoginController@loginVK')->name('login.vk');
