<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        return view('salas.index');
    }

    public function create()
    {
        return view('salas.create');
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

                $sala = Sala::create([
                    'id_sala' => $registro['id_sala'],
                    'numero_cadeiras' => $registro['numero_cadeiras'],
                    'acessivel' => $registro['acessivel'],
                    'qualidade' => $registro['qualidade']
                ]);
                $sala->save();
            }
            fclose($f);
        }
        return $return = 'sucesso!';
    }

    public function turmas()
    {
        return view('turmas.index');
    }

    public function addTurmas()
    {
        return view('turmas.add');
    }
}
