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

/* original 2022.06.17
Route::get('/', function () {
    return view('welcome');
});
*/

/*2022.06.17からこの内容に書き換え*/
Route::get('/', 'MessagesController@index');

Route::resource('messages', 'MessagesController');
/*2022.06.17からこの内容に書き換え*/