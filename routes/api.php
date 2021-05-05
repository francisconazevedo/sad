<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Site')->group(function (){
    route::get('buscar_endereco/{cep}', 'EnderecoController@buscarEndereco')->name('buscar_endereco');
    route::get('bairros_disponiveis', 'HomeController@bairrosDisponiveis')->name('buscar_bairros');
    route::get('bairros_disponiveis', 'HomeController@bairrosDisponiveis')->name('buscar_bairros');
    route::get('formas_entrega', 'HomeController@formasEntrega')->name('formas_entrega');
    route::get('formas_pagamento', 'HomeController@formasPagamento')->name('formas_pagamento');
    route::get('lista-estados', 'HomeController@listaEstados')->name('buscar_estados');
    route::get('lista-cidades/{estado}', 'HomeController@listaCidades')->name('buscar_cidades');
    route::get('lista-bairros/{cidade}', 'HomeController@listaBairros')->name('buscar_bairros');

});
