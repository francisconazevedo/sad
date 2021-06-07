<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        try {
            DB::beginTransaction();

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('salas')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
            DB::commit();
            return view('salas.index', compact('salas'));

        }catch (\Exception $exception){
            DB::rollBack();
            var_dump('tere');
        }
    }

    public function salasPossiveis(Request $request){
        $requisitosSala = $request->all();

        $result = Sala::where('acessivel', '>=', $requisitosSala['acessibilidade'])
            ->where('qualidade', '>=', $requisitosSala['qualidade'])
            ->where('numero_cadeiras', '>=', $requisitosSala['numero_cadeiras'])
           ->get()->toArray();

        return $result;
    }

}
