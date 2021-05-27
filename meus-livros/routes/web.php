<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', 'App\Http\Controllers\LivrosController@index');
//Route::get('/livros', 'App\Http\Controllers\LivrosController@index');
//Route::get('/livros/listar', 'App\Http\Controllers\LivrosController@index');
//Route::get('/livros/listar/todos', 'App\Http\Controllers\LivrosController@index');
// The four routes above being expressed as a single regex route below
Route::get('/{route?}', 'App\Http\Controllers\LivrosController@index')->where('route', '(|livros|livros/listar|livros/listar/todos)');
Route::get('/livros/buscar', 'App\Http\Controllers\LivrosController@buscar');
Route::get('/livros/search', 'App\Http\Controllers\LivrosController@search');
Route::get('/livros/listar/lidos', 'App\Http\Controllers\LivrosController@indexLidos');
Route::get('/livros/listar/nao-lidos', 'App\Http\Controllers\LivrosController@indexNaoLidos');
Route::get('/livros/adicionar', 'App\Http\Controllers\LivrosController@adicionar');
Route::post('/livros/store', 'App\Http\Controllers\LivrosController@store');
Route::delete('/livros/destroy/{id}', 'App\Http\Controllers\LivrosController@destroy');
Route::get('/livros/atualizar/{id}', 'App\Http\Controllers\LivrosController@atualizar');
Route::put('/livros/update/{id}', 'App\Http\Controllers\LivrosController@update');