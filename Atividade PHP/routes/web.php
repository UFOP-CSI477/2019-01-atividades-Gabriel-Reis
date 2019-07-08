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


Route::get('/', 'PaginasController@index');
Route::resource('/procedures', 'ProceduresController');
// Route::get('/tests', 'TestsController@index');
// Route::get('/procedures', 'ProceduresController@index');
// Route::get('/user', 'UsersController@index');
