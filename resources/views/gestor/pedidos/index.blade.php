@extends('layouts.gestor.gestor')

@section('title', 'Relatório de pedidos - ')
@section('header-title', 'Relatório de pedidos')

@section('card-tools')

@endsection

@section('content')

    <div class="card-body">
<?php
    $de = date("Y-m-d\T00:00", strtotime('-1 month'));
    $ate = date("Y-m-d\TH:i")
?>
        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"
              action="{{ route('gestor.pedidos.index') }}">
            <div>
                <div class="input-group mb-3">
                    <div class="col-md-4">
                        <label for="nome" style="margin-left:10px; margin-top: 10px; margin-right: 5px">De: </label>
                        <input name="data_de" id="calendar" placeholder="De" class="calendar form-control"
                               style="min-width: 120px" type="datetime-local" value="{{ request()->query('data_de') ?? $de }}">
                    </div>
                    <div class="col-md-4">
                        <label for="nome" style="margin-left:10px; margin-top: 10px; margin-right: 5px">Até: </label>
                        <input name="data_ate" id="calendar" placeholder="Até" class="calendar form-control"
                               style="min-width: 120px" type="datetime-local"
                               value="{{request()->query('data_ate') ?? $ate }}">
                    </div>
                    <div class="col-md-4" style="align-self: flex-end;">
                        <div class="input-group-append">
                            <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default ml-1" href="{{ route('gestor.pedidos.index') }}">Limpar</a>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <!---------------- / Busca ---------------->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data do pedido</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td><?php echo $pedido->descricao ?></td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($pedido->created_at))}}</td>
                        <td>R${{ number_format($pedido->valor, 2, ',', '.') }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
