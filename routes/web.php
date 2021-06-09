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

use App\Http\Controllers\SalaController;

Route::get('/', 'GestorController@index')->name('home');
Route::get('/salas', 'SalaController@index')->name('salas.index');
Route::get('/salas/create', 'SalaController@create')->name('salas.create');
Route::post('/salas', 'SalaController@store')->name('salas.store');
Route::get('/turmas', 'TurmaController@index')->name('turmas.index');
Route::get('/turma/{id}', 'TurmaController@view')->name('turmas.view');
Route::post('/alterarSala', 'SalaController@alterarSala')->name('salas.alterar');
Route::get('/turmas/create', 'TurmaController@create')->name('turmas.create');
Route::post('/turmas', 'TurmaController@store')->name('turmas.store');
Route::get('/salasPossiveis', 'SalaController@salasPossiveis')->name('salas.possiveis');
Route::get('/sala/{id}', 'SalaController@view')->name('salas.view');
