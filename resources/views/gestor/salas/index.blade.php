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

        <!----------------- Busca ----------------->
{{--        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"--}}
{{--              action="{{ route('gestor.forma_pagamentos.index') }}">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <input name="nome" placeholder="Pesquisa por nome" class="form-control"--}}
{{--                           style="min-width: 120px" type="text" value="{{ request()->query('nome') }}">--}}

{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>--}}
{{--                        <a class="btn btn-default ml-1" href="{{ route('gestor.forma_pagamentos.index') }}">Limpar</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <!---------------- / Busca ---------------->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>teste</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
