<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Acompanhamento;
use App\Models\AcompanhamentoCategoria;

class AcompanhamentosController extends Controller
{
    public function index()
    {
        $acompanhamentos = Acompanhamento
            ::nome(request()->input('nome'))
            ->categoriaId(request()->input('categoria_id'))
            ->paginate(15);
        $categorias = AcompanhamentoCategoria::all();

        return view('gestor.acompanhamentos.index')->with(compact('acompanhamentos', 'categorias'));
    }

    public function livewire($id = null)
    {
        return view('gestor.acompanhamentos.livewire')->with('id', $id);
    }

    public function destroy(Acompanhamento $acompanhamento)
    {
        $acompanhamento->delete();
        return redirect()->route('gestor.acompanhamentos.index');
    }
}
