<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('/todos','TodoController@index')->name('todo.index');

Route::get('/todos/create', 'TodoController@create');

Route::post('/todos/create','TodoController@store');

Route::get('/todos/{todo}/edit', 'TodoController@edit');// /todos/{todo}/edit"rout model binding
Route::get('/todos/{todo}/show', 'TodoController@show')->name('todo.show');

Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update');

Route::patch('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');

Route::patch('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');

Route::delete('/todos/{todo}/delete','TodoController@delete')->name('todo.delete');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
