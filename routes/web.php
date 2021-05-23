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
Route::get('/salas', 'GestorController@salas')->name('gestor.salas.index');
Route::get('/adicionar-salas', 'GestorController@addSalas')->name('gestor.salas.add');
Route::get('/turmas', 'GestorController@turmas')->name('gestor.turmas.index');
Route::get('/adicionar-turmas', 'GestorController@addTurmas')->name('gestor.turmas.add');
