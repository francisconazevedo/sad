<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Pedido;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::filtroData(
            request()->input('data_de'),
            request()->input('data_ate'))
            ->paginate(15);

        return view('gestor.pedidos.index')->with(compact('pedidos'));
    }

    public function livewire($id = null)
    {
        return view('gestor.pedidos.livewire')->with('id', $id);
    }

}
