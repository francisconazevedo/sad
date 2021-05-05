<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Cardapio;
use Carbon\Carbon;

class CardapiosController extends Controller
{
    public function index()
    {
        $cardapios = Cardapio
            ::periodo(request()->input('de'), request()->input('ate'))
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('gestor.cardapios.index', compact('cardapios'));
    }

    public function livewire($id = null)
    {
        return view('gestor.cardapios.livewire')->with('id', $id);
    }

    public function destroy(Cardapio $cardapio)
    {
        $cardapio->delete();
        return redirect()->route('gestor.cardapios.index');
    }
}
