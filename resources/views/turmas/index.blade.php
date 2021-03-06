@extends('layouts.gestor.gestor')

@section('title', 'Turmas - ')
@section('header-title', 'Gerenciar Turmas')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('turmas.create') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Inserir CSV
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div id="setOpacity" class="table-responsive">
            <table class="table table-bordered" style="text-align: center;">
                <thead>
                <tr>
                    <th>Turma</th>
                    <th>Disciplina</th>
                    <th>Professor</th>
                    <th style="width: 12%;">Alunos matriculados</th>
                    <th>Curso</th>
                    <th>Período</th>
                    <th>Acessibilidade</th>
                    <th>Qualidade</th>
                    <th>Horário // Sala</th>
                </tr>
                </thead>
                <tbody>
                @foreach($turmas as $key => $turma)
                    <tr>
                        <td>{{$turma['id_turma']}}</td>
                        <td id="disciplina<?=$key?>">{{$turma['disciplina']}}</td>
                        <td id="professor<?=$key?>">{{$turma['professor']}}</td>
                        <td id="numero_alunos<?=$key?>">{{$turma['numero_alunos']}}</td>
                        <td id="curso<?=$key?>">{{$turma['curso']}}</td>
                        <td id="período<?=$key?>">{{$turma['periodo']}}°</td>
                        <td id="acessibilidade<?=$key?>" style="display: none">{{$turma['acessibilidade']}}</td>
                        <td>
                            @if($turma['acessibilidade'] == 1)
                                <i class='fa fa-check'></i>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                        </td>
                        <td id="qualidade<?=$key?>">{{$turma['qualidade']}}</td>

                        <td id="id_sala_turma<?=$key?>">
                            @if(!empty($turma['horarios_sala']))
                                @foreach ($turma['horarios_sala'] as $horario)
                                    {{$horario['horario']}} //
                                    <a href="#" onclick="dadosSalas({{$horario['id_sala']}})" data-toggle="modal"
                                       data-target="#infoSalas"
                                       data-backdrop="false">{{ $horario['id_sala'] }}</a>
                                    <a onclick="getData(<?= $key ?>, '{{$horario['horario']}}')" style="margin: 5px;" href="#" data-turma="{{$turma['id_turma']}}" data-toggle="modal"
                                       data-target="#exampleModalCenter"
                                       data-backdrop="false">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <br>

                                @endforeach
                            @else
                                Sem sala
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span id="turma_id" style=" visibility: hidden;"></span>
                            <h5 class="modal-title" id="exampleModalLongTitle">Opções de salas para  o horário #<span id="horario_id"></span></h5>
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
                                        <th style="width: 12%;">Capacidade</th>
                                        <th>Acessibilidade</th>
                                        <th>Qualidade</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tabelaSalas">
                                    </tbody>
                                </table>
                        </div>
                            <form id="editaSala" action="/alterarSala" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id_turma" name="id_turma" value="">
                                <input type="hidden" id="id_sala" name="id_sala" value="">
                                <input type="hidden" id="horario" name="horario" value="">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cancelar"  data-dismiss="modal">Cancelar</button>
                                    <button type="submit" onclick="submitFormSala()" class=" salvar btn btn-primary">Salvar</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
            <div class="modal fade" id="infoSalas" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informações da Sala #<span id="sala_id"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="text-align: center;">
                                    <thead>
                                    <tr>

                                        <th style="width: 12%;">Capacidade</th>
                                        <th>Acessibilidade</th>
                                        <th>Qualidade</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tabelaSala">
                                    </tbody>
                                </table>
                            </div>

                            <h5>Turmas Alocadas</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" style="text-align: center;">
                                    <thead>
                                    <tr>

                                        <th style="width: 12%;">Disciplina</th>
                                        <th>Professor</th>
                                        <th>Curso</th>
                                        <th>Período</th>
                                        <th>Horários</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tabelaTurma">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal -->

@endsection

