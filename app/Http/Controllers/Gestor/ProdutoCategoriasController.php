<?php

namespace App\Http\Controllers\Gestor;

use App\Models\ProdutoCategoria;

class ProdutoCategoriasController extends Controller
{
    public function index()
    {
        $produtoCategorias = ProdutoCategoria::buscaNome(request()->input('nome'))->paginate(15);

        return view('gestor.produto_categorias.index')->with(compact('produtoCategorias'));
    }

    public function livewire($id = null)
    {
        return view('gestor.produto_categorias.livewire')->with('id', $id);
    }

    public function destroy(ProdutoCategoria $produtoCategoria)
    {
        $produtoCategoria->delete();
        return redirect()->route('gestor.produto_categorias.index');
    }
}
