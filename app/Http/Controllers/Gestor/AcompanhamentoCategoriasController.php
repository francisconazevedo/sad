<?php

namespace App\Http\Controllers\Gestor;

use App\Models\AcompanhamentoCategoria;

class AcompanhamentoCategoriasController extends Controller
{
    public function index()
    {
        $acompanhamentoCategorias = AcompanhamentoCategoria::buscaNome(request()->input('nome'))->paginate(15);

        return view('gestor.acompanhamento_categorias.index')->with(compact('acompanhamentoCategorias'));
    }

    public function livewire($id = null)
    {
        return view('gestor.acompanhamento_categorias.livewire')->with('id', $id);
    }

    public function destroy(AcompanhamentoCategoria $acompanhamentoCategoria)
    {
        $acompanhamentoCategoria->delete();
        return redirect()->route('gestor.acompanhamento_categorias.index');
    }
}
