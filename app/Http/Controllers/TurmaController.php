<?php

namespace App\Http\Controllers;

use App\Models\Horario;
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
        foreach($turmas as $key=>$turma){
            $turmas[$key]['horarios_sala'] = Horario::where('id_turma', '=', $turma['id_turma'])->get()->toArray();
        }
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
        $salas = Sala::all()->toArray();
        foreach ($salas as $key=>$sala){
            $salas[$key]['horarios_ocupados'] = [];

        }

        $alocacao = $this->alocacaoSalas($listaTurmas, $salas);
        $this->salvarTurmas($alocacao['turmas']);

        $turmas = Turma::all();

        foreach($turmas as $key=>$turma){
            $turmas[$key]['horarios_sala'] = Horario::where('id_turma', '=', $turma['id_turma'])->get()->toArray();
        }
        return view('turmas.index', compact('turmas')) ;
    }

    private function alocacaoSalas($listaTurmas, $salas)
    {
        foreach ($listaTurmas as $key => $row) {
            $numero_alunos[$key] = $row['numero_alunos'];
            $acessibilidade[$key] = $row['acessibilidade'];
            $qualidade[$key] = $row['qualidade'];
        }

        $numero_alunos = array_column($listaTurmas, 'numero_alunos');
        $acessibilidade = array_column($listaTurmas, 'acessibilidade');
        $qualidade = array_column($listaTurmas, 'qualidade');

        array_multisort($numero_alunos, SORT_DESC, $acessibilidade, SORT_DESC, $qualidade, SORT_ASC, $listaTurmas);
        $salaSelecionada = $salas[0];
        foreach ($listaTurmas as $key => $turma) {
            $listaTurmas[$key]['horarios_com_salas'] = [];
            $horarios = explode('-', $turma['dias_horario']);
            foreach ($horarios as $horario) {
                foreach ($salas as $keysala => $sala) {
                    if (!in_array($horario, $salas[$keysala]['horarios_ocupados']) &&
                        !in_array($horario, $listaTurmas[$key]['horarios_com_salas'])
                    ) {
                        if ((abs($sala['numero_cadeiras'] - $turma['numero_alunos']) <=
                                abs($salaSelecionada['numero_cadeiras'] - $turma['numero_alunos'])) &&
                            $sala['numero_cadeiras'] >= $turma['numero_alunos']
                        ) {
                            if ( $turma['acessibilidade'] <= $sala['acessivel']) {

                                if ($turma['qualidade'] >= $sala['qualidade']) {
                                    $salaSelecionada = $sala;
                                    $salaencontrada = $keysala;
                                }
                            }
                        }

                    }
                }
                if ($salaSelecionada) {
                    $salas[$salaencontrada]['horarios_ocupados'][] = $horario;
                    $listaTurmas[$key]['id_sala_turma'] = $salaSelecionada['id_sala'];
                    $listaTurmas[$key]['horarios_com_salas'][] = $horario;
                    $listaTurmas[$key]['horarios_sala'][] = ['horario' => $horario, 'sala' => $salaSelecionada['id_sala']];
                    $salaencontrada = false;

                }
            }
        }
        return ['turmas' => $listaTurmas, 'salas' => $salas];
    }

    public function salvarTurmas($listaTurmas)
    {
        try {
            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('turmas')->truncate();
            DB::table('horarios_salas')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            foreach ($listaTurmas as $turma) {
                $newTurma['disciplina'] = $turma['disciplina'];
                $newTurma['professor'] = $turma['professor'];
                $newTurma['dias_horario'] = $turma['dias_horario'];
                $newTurma['numero_alunos'] = $turma['numero_alunos'];
                $newTurma['curso'] = $turma['curso'];
                $newTurma['periodo'] = $turma['periodo'];
                $newTurma['acessibilidade'] = $turma['acessibilidade'];
                $newTurma['qualidade'] = $turma['qualidade'];
                $id = Turma::insertGetId($newTurma);
                foreach ($turma['horarios_sala'] as $horario){
                    $newhora = Horario::create([
                            'horario'=> $horario['horario'],
                            'id_sala'=> $horario['sala'],
                            'id_turma'=> $id]
                    );
                    $newhora->save();
                }
            }

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function view($id = null){
        $turma = Turma::where('id_turma', $id)->get()->toArray();
        return $turma;
    }

    public function alterarSala(){

    }

}
