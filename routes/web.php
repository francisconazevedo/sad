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

Route::get('/', 'GestorController@index')->name('home');
Route::get('/salas', 'SalaController@salas')->name('salas.index');
Route::get('/adicionar-salas', 'SalaController@addSalas')->name('salas.add');
Route::get('/turmas', 'TurmaController@turmas')->name('turmas.index');
Route::get('/adicionar-turmas', 'TurmaController@addTurmas')->name('turmas.add');
