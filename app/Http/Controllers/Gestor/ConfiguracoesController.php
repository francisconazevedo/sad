<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Configuracao;
use App\Http\Requests\ConfiguracaoRequest;
use Illuminate\Support\Facades\Session;

class ConfiguracoesController extends Controller
{
    public function edit(Configuracao $configuracao)
    {
        return view('gestor.configuracoes.edit')->with('configuracao', $configuracao);
    }

    public function update(ConfiguracaoRequest $request, Configuracao $configuracao)
    {
        $configuracao->update($request->all());

        Session::flash('notify', 'Salvo com sucesso');

        return redirect()->route('gestor.configuracoes.edit', 1);
    }
}
