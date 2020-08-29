<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PagesController@index');
Route::get('/cart','PagesController@cart');
Route::get('/about','PagesController@about');

Auth::routes();


Route::view('/welcome','welcome');


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload','HomeController@upload');
Route::get('/todos','TodoController@index')->name('todos');
Route::get('/todos/create','TodoController@create');
Route::get('/todos/{todo}/edit','TodoController@edit');
Route::get('/todos/{todo}/show','TodoController@show')->name('todo.show');
Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update');
Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');
Route::put('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');
Route::patch('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');
Route::post('/todos/create','TodoController@store');