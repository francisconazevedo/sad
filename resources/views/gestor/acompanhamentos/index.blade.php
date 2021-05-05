@extends('layouts.gestor.gestor')

@section('title', 'Acompanhamentos - ')
@section('header-title', 'Acompanhamentos')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.acompanhamento') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"
              action="{{ route('gestor.acompanhamentos.index') }}">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input name="nome" placeholder="Pesquisa por nome" class="form-control"
                           style="min-width: 120px" type="text" value="{{ request()->query('nome') }}">

                    <select class="custom-select" style="max-width: 150px" name="categoria_id">
                        <option value="">Categoria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}"
                                    @if(request()->query('categoria_id') == $categoria->id) selected @endif>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                        <a class="btn btn-default ml-1" href="{{ route('gestor.acompanhamentos.index') }}">Limpar</a>
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
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($acompanhamentos as $acompanhamento)
                    <tr>
                        <td>{{ $acompanhamento->nome }}</td>
                        <td>{{ $acompanhamento->categoria->nome }}</td>
                        <td>R$ {{ number_format($acompanhamento->valor, 2, ',', '.') }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.acompanhamento', $acompanhamento->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $acompanhamento->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $acompanhamento->id }}"
                                  action="{{ route('gestor.acompanhamentos.destroy', $acompanhamento->id) }}" method="POST"
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
        {{ $acompanhamentos->links() }}
    </div>
@endsection
