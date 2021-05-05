<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Bairro;

class BairrosController extends Controller
{
    public function index()
    {
        $bairros = Bairro::buscaFiltro(
            request()->input('nome'),
            request()->input('estado'),
            request()->input('cidade')
        )->paginate(15);

        $forFilter = Bairro::where('ativo', '=', 'S')->get();
        $estados = [];
        $cidades = [];
        foreach ($forFilter as $filter){
            if(!in_array($filter->estado, $estados)){
                $estados[] = $filter->estado;
            }
            if(!in_array($filter->cidade, $cidades)){
                $cidades[] = $filter->cidade;
            }
        }

        return view('gestor.bairros.index')->with(compact('bairros', 'cidades', 'estados'));
    }

    public function livewire($id = null)
    {
        return view('gestor.bairros.livewire')->with('id', $id);
    }

    public function destroy(Bairro $bairro)
    {
        $bairro->delete();
        return redirect()->route('gestor.bairros.index');
    }
}
