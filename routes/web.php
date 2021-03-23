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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/home', array('as'=>'home', 'uses'=>'HomeController@index'));
Route::post('toDoAction', array('as'=>'toDoAction', 'uses'=>'ToDoActionController@createToDo'));
Route::get('updateStatus/{id}', array('as'=>'updateStatus{id}', 'uses'=>'ToDoActionController@updateStatus'));

