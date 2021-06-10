@extends('layouts.gestor.gestor')

@section('title', 'Salas - ')
@section('header-title', 'Gerenciar Salas')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('salas.create') }}">
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
                @foreach($salas as $sala)

                    <tr>
                        <td>{{$sala['id_sala']}}</td>
                        <td>{{$sala['numero_cadeiras']}}</td>
                        <td><?= $sala['acessivel'] == 1 ? '<i class="fa fa-check"></i>' : '<i class="fas fa-times"></i>' ?>
                        </td>
                        <td>{{$sala['qualidade']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
