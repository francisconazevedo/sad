<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function create()
    {
        return view('turmas.create');
    }

    public function index()
    {
        $turmas = Turma::all();
        return view('turmas.index', compact('turmas'));
    }


    public function store(Request $request)
    {
        $delimitador = ',';
        $cerca = '"';

        $f = fopen($request->file('turmas')->getPathname(), 'r');
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
        $salas = Sala::all();
        $alocacao = $this->alocacaoSalas($listaTurmas, $salas);
        $this->salvarTurmas($alocacao['turmas']);

        $turmas = Turma::all();
        return view('turmas.index', compact('turmas')) ;
    }

    private function alocacaoSalas($listaTurmas, $salas){

        $salaSelecionada = $salas[0];
        foreach ($listaTurmas as $key=>$turma){
            foreach ($salas as $keysala=>$sala){
                if ((abs($sala['numero_cadeiras'] - $turma['numero_alunos']) <=
                        abs($salaSelecionada['numero_cadeiras'] - $turma['numero_alunos'])) &&
                    $sala['numero_cadeiras'] >= $turma['numero_alunos']
                ){
                    if ($turma['acessibilidade'] <= $sala['acessivel']){
                        if ($turma['qualidade'] <= $sala['qualidade']){
                            $horarios = explode('-', $turma['dias_horario']);
                            $inarray = false;
                            foreach ($horarios as $horario){
                                if (in_array($horario, explode('-', $sala['horarios_ocupados']))){
                                    $inarray = true;
                                    break;
                                }
                            }
                            if (!$inarray){
                                $salaSelecionada = $sala;
                                $salas[$keysala]['horarios_ocupados'] == null ?
                                    $salas[$keysala]['horarios_ocupados'] = $turma['dias_horario'] :
                                    $salas[$keysala]['horarios_ocupados'].'-'.$turma['dias_horario'];
                                $listaTurmas[$key]['id_sala_turma'] = $sala['id_sala'];
                           }
                        }
                    }
                }
            }
        }
        return ['turmas' => $listaTurmas, 'salas'=> $salas];
    }

    public function salvarTurmas($listaTurmas)
    {
        try {
            DB::beginTransaction();

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('turmas')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            foreach ($listaTurmas as $turma) {
                $newTurma = new Turma();
                $newTurma->disciplina = $turma['disciplina'];
                $newTurma->professor = $turma['professor'];
                $newTurma->dias_horario = $turma['dias_horario'];
                $newTurma->numero_alunos = $turma['numero_alunos'];
                $newTurma->curso = $turma['curso'];
                $newTurma->periodo = $turma['periodo'];
                $newTurma->acessibilidade = $turma['acessibilidade'];
                $newTurma->qualidade = $turma['qualidade'];
                $newTurma->id_sala_turma = $turma['id_sala_turma'] ?? null;
                $newTurma->save();
            }

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
