<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
    }

    public function store(Request $request)
    {
        $delimitador = ',';
        $cerca = '"';

        $f = fopen($request->file('salas')->getPathname(), 'r');
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

                $sala = Sala::firstOrCreate([
                    'id_sala' => $registro['id_sala'],
                    'numero_cadeiras' => $registro['numero_cadeiras'],
                    'acessivel' => $registro['acessivel'],
                    'qualidade' => $registro['qualidade']
                ]);
                $sala->save();
            }
            fclose($f);
        }
        $salas = Sala::all();
        $return = ['code'=> 200, 'message'=> 'Success!'];
        return view('salas.index', compact('salas', 'return'));
    }
}
