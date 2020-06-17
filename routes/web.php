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

//rota para filmes upcoming
Route::get('/upcoming/{page}','MoviesController@upcoming');

//rota para filmes toprated
Route::get('/toprated/{page}','MoviesController@toprated');

//rota para informações de um único filme
Route::get('/movie/{id}','MoviesController@movie');

//rota para listar os gêneros
Route::get('/genres','GenresController@index');

//rota para filmes atrelados ao genero em parametro
Route::get('/genre/{id}','GenresController@list');


