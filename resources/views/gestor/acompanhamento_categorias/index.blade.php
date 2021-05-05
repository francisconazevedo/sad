@extends('layouts.gestor.gestor')

@section('title', 'Acompanhamento Categorias - ')
@section('header-title', 'Acompanhamento Categorias')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.acompanhamento_categoria') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"
              action="{{ route('gestor.acompanhamento_categorias.index') }}">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input name="nome" placeholder="Pesquisa por nome" class="form-control"
                           style="min-width: 120px" type="text" value="{{ request()->query('nome') }}">

                    <div class="input-group-append">
                        <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                        <a class="btn btn-default ml-1" href="{{ route('gestor.acompanhamento_categorias.index') }}">Limpar</a>
                    </div>
                </div>
            </div>
        </form>
        <!---------------- / Busca ---------------->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($acompanhamentoCategorias as $acompanhamentoCategoria)
                    <tr>
                        <td>{{ $acompanhamentoCategoria->nome }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.acompanhamento_categoria', $acompanhamentoCategoria->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $acompanhamentoCategoria->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $acompanhamentoCategoria->id }}"
                                  action="{{ route('gestor.acompanhamento_categorias.destroy', $acompanhamentoCategoria->id) }}"
                                  method="POST"
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
        {{ $acompanhamentoCategorias->links() }}
    </div>
@endsection
