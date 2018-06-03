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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::get('/', function () {
  //  return view('mainPage');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/delete/{link}', 'PostsController@delete');

Route::get('/{link}', 'PostsController@show')->name('textShow');

Route::get('/','PostsController@add');
Route::post('/', 'PostsController@store')->name('textStore');

Route::post('/{link}', 'PostsController@restore')->name('textReStore');