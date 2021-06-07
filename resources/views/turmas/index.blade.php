@extends('layouts.gestor.gestor')

@section('title', 'Turmas - ')
@section('header-title', 'Gerenciar Turmas')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('turmas.create') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Inserir CSV
    </a>
    <button class="fa fa-save btn btn-success content animate__animated animate__flipInX">
        Salvar
    </button>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Professor</th>
                    <th>Dias e horários</th>
                    <th style="width: 12%;">Alunos matriculados</th>
                    <th>Curso</th>
                    <th>Período</th>
                    <th>Acessibilidade</th>
                    <th>Qualidade</th>
                    <th>Salas</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alocacao['turmas'] as $key => $turma)
                <tr>
                    <td id="disciplina<?=$key?>">{{$turma['disciplina']}}</td>
                    <td id="professor<?=$key?>">{{$turma['professor']}}</td>
                    <td id="dias_horario<?=$key?>">{{$turma['dias_horario']}}</td>
                    <td id="numero_alunos<?=$key?>">{{$turma['numero_alunos']}}</td>
                    <td id="curso<?=$key?>">{{$turma['curso']}}</td>
                    <td id="período<?=$key?>">{{$turma['período']}}°</td>
                    <td id="acessibilidade<?=$key?>" style="display: none">{{$turma['acessibilidade']}}</td>
                    <td>
                        @if($turma['acessibilidade'] == 1)
                            <i class='fa fa-check'></i>
                        @else
                            <i class="fas fa-times"></i>
                        @endif
                    </td>
                    <td id="qualidade<?=$key?>">{{$turma['qualidade']}}</td>

                    <td id="id_sala_turma<?=$key?>"> {{$turma['id_sala_turma'] ?? 'sem sala'}}</td>
                    <td>
                        <button type="button" onclick="getData(<?= $key ?>)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="false">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Opções de salas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="text-align: center;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sala</th>
                                        <th style="width: 12%;">Alunos matriculados</th>
                                        <th>Acessibilidade</th>
                                        <th>Qualidade</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tabelaSalas">
                                    </tbody>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

@endsection

