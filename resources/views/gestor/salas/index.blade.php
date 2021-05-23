@extends('layouts.gestor.gestor')

@section('title', 'Salas - ')
@section('header-title', 'Gerenciar Salas')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.salas.add') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive" style="text-align: center">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sala</th>
                    <th>Número de cadeiras</th>
                    <th>Acessibilidade</th>
                    <th>Qualidade</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>100</td>
                        <td><i class="fa fa-check"></i></td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
