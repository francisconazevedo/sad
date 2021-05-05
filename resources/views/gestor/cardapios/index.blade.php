@extends('layouts.gestor.gestor')

@section('title', 'Cardápios - ')
@section('header-title', 'Cardápios')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.cardapio') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get" action="{{ route('gestor.cardapios.index') }}">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>De</label>
                        <input name="de" placeholder="De" class="form-control"
                               type="date" value="{{ request()->query('de') }}">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Até</label>
                        <div class="input-group">
                            <input name="ate" placeholder="Até" class="form-control"
                                   type="date" value="{{ request()->query('ate') }}">

                            <div class="input-group-append ml-2">
                                <button class="btn btn-default table-search"><i class="fa fa-search"></i></button>
                                <a class="btn btn-default ml-1" href="{{ route('gestor.cardapios.index') }}">Limpar</a>
                            </div>
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
                    <th></th>
                    <th>Dia</th>
                    <th>Produto</th>
                    <th>Horário</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cardapios as $cardapio)
                    <tr>
                        <td>{{ $cardapio->dia->formatLocalized('%d %A, %B') }}</td>
                        <td>{{ $cardapio->dia->format('d/m/Y') }}</td>
                        <td>{{ $cardapio->produto->nome }}</td>
                        <td>{{ $cardapio->horario->nome }}</td>
                        <td>{{ $cardapio->indisponivel ? 'Indisponível' : 'Disponível' }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('gestor.cardapio', $cardapio->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('cardapio-form-{{ $cardapio->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="cardapio-form-{{ $cardapio->id }}"
                                  action="{{ route('gestor.cardapios.destroy', $cardapio->id) }}" method="POST"
                                  style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                            <!-- / Remover -->
                        </td>
                        <!-- / Ações -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        {{ $cardapios->links() }}
    </div>
@endsection
