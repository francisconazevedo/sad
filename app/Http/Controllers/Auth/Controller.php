<?php

namespace App\Http\Controllers\Auth;

use App\Models\Configuracao;
use App\Models\Pagina;
use App\Models\ProdutoCategoria;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('configuracoes', Configuracao::first());
        View::share('categorias', ProdutoCategoria::all());
        View::share('paginas', (object)[
            'sobre_nos' => Pagina::where('slug', 'sobre-nos')->first()
        ]);
    }
}
