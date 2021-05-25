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

Route::get('/', 'App\Http\Controllers\FrasesController@index');
Route::get('/frases', 'App\Http\Controllers\FrasesController@index')->name("listar");
Route::get('/frases/criar', 'App\Http\Controllers\FrasesController@create');
Route::post('/frases/criar', 'App\Http\Controllers\FrasesController@store');
//Route::post('/frases/remover/{id}', 'App\Http\Controllers\FrasesController@destroy');
Route::delete('/frases/remover/{id}', 'App\Http\Controllers\FrasesController@destroy');