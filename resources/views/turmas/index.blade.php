@extends('layouts.gestor.gestor')

@section('title', 'Turmas - ')
@section('header-title', 'Gerenciar Turmas')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('turmas.add') }}">
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
                <tr>
                    <td>COMP0311</td>
                    <td>Prof T</td>
                    <td>2M12 - 4M12</td>
                    <td>100</td>
                    <td>EC</td>
                    <td>5°</td>
                    <td><i class="fa fa-check"></i></td>
                    <td>0</td>

                    <td>
                        <select class="form-control">
                            <option value="">-- Sala --</option>
                            <option value="A">Sala A</option>
                            <option value="B">Sala B</option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
