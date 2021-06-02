<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function create()
    {
        return view('turmas.create');
    }

    public function turmas()
    {
        return view('turmas.index');
    }


    public function store(Request $request)
    {
        $delimitador = ',';
        $cerca = '"';

        $f = fopen('/tmp/'.$request->file('salas')->getFilename(), 'r');
        if ($f) {
            // Ler cabecalho do arquivo
            $cabecalho = fgetcsv($f, 0, $delimitador);

            while (!feof($f)) {
                // Ler uma linha do arquivo
                $linha = fgetcsv($f, 0, $delimitador, $cerca);
                if (!$linha) {
                    continue;
                }
                // Montar registro com valores indexados pelo cabecalho
                $registro = array_combine($cabecalho, $linha);
                $listaTurmas[] = $registro;
            }
            fclose($f);
        }
        return view('turmas.index', compact('listaTurmas')) ;
    }
}
