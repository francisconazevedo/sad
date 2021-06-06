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
                </tr>
                </thead>
                <tbody>
                @foreach($listaTurmas as $turma)
                <tr>
                    <td>{{$turma['disciplina']}}</td>
                    <td>{{$turma['professor']}}</td>
                    <td>{{$turma['dias_horario']}}</td>
                    <td>{{$turma['numero_alunos']}}</td>
                    <td>{{$turma['curso']}}</td>
                    <td>{{$turma['periodo']}}°</td>
                    <td><i class="fa fa-check"></i></td>
                    <td>{{$turma['qualidade']}}</td>

                    <td> {{$turma['id_sala_turma'] ?? 'sem sala'}}
                        <select class="form-control">
                            @foreach($salas as $sala)
                            <option value="{{$sala['id_sala']}}">Sala {{$sala['id_sala']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
