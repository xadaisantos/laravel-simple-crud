<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\FrasesController@index');
Route::get('/frases/index', 'App\Http\Controllers\FrasesController@index')->name("listar");
Route::get('/frases/englishAZ', 'App\Http\Controllers\FrasesController@indexEnglishAZ');
Route::get('/frases/portugueseAZ', 'App\Http\Controllers\FrasesController@indexportugueseAZ');
Route::get('/frases/criar', 'App\Http\Controllers\FrasesController@create');
Route::post('/frases/criar', 'App\Http\Controllers\FrasesController@store');
Route::delete('/frases/remover/{id}', 'App\Http\Controllers\FrasesController@destroy');
Route::get('/frases/update/{id}', 'App\Http\Controllers\FrasesController@updatePage');
Route::put('/frases/update/{id}', 'App\Http\Controllers\FrasesController@update');