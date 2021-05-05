<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Produto;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto
            ::nome(request()->input('nome'))
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('gestor.produtos.index', compact('produtos'));
    }

    public function livewire($id = null)
    {
        return view('gestor.produtos.livewire')->with('id', $id);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('gestor.produtos.index');
    }
}
