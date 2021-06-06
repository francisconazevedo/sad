<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function create()
    {
        return view('turmas.create');
    }

    public function index()
    {
        $listaTurmas = Turma::all();
        return view('turmas.index', compact('listaTurmas'));
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
        $turmasInseridas = $listaTurmas;
        $salasSemAlocacao = $salas;
        $alocacao = $this->alocacaoSalas($turmasInseridas, $salasSemAlocacao);

        dd($alocacao);
        return view('turmas.index', compact('listaTurmas', 'salas')) ;
    }

    private function alocacaoSalas($turmasInseridas, $salasSemAlocacao){

        set_time_limit(0);
        $listaTurmas = $turmasInseridas;
        $salas = $salasSemAlocacao;

        $salaSelecionada = $salas[0];
        foreach ($listaTurmas as $key=>$turma){
            $encontrouSala = false;
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
                                $encontrouSala = true;
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
            if (!$encontrouSala){
                $turmaPrioridade = $turma;
                unset($turmasInseridas[$key]);
                array_unshift($turmasInseridas, $turma);
                $this->alocacaoSalas($turmasInseridas, $salasSemAlocacao);
                var_dump($turma);
            }
        }
        return ['listaTurmas' => $listaTurmas, ''];
    }
}
