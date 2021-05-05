@extends('layouts.gestor.gestor')

@section('title', 'Bairros para Entrega- ')
@section('header-title', 'Bairros para Entrega')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{route('gestor.bairro')}}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"
              action="{{ route('gestor.bairros.index') }}">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <div class="col-md-3">
                        <label>Nome</label>
                    <input name="nome" placeholder="Pesquisa por nome" class="form-control"
                           style="min-width: 120px" type="text" value="{{ request()->query('nome') }}">
                    </div>
                    <div class="col-md-3">
                        <label>Estado</label>
                        <select id="estado" name="estado" class="form-control">
                            <option value="{{request()->query('estado') }}">{{request()->query('estado') }}</option>

                            @foreach($estados as $estado)
                                <option value="{{$estado}}">{{$estado}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <label>Cidade</label>
                        <select id="cidade" name="cidade" class="form-control">
                            <option value="{{request()->query('cidade') }}">{{request()->query('cidade') }}</option>

                        @foreach($cidades as $cidade)
                                <option value="{{$cidade}}">{{$cidade}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3" style="align-self: flex-end;">
                        <div class="input-group-append">
                            <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                            <a class="btn btn-default ml-1" href="{{ route('gestor.bairros.index') }}">Limpar</a>
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
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Taxa</th>
                    <th>Ativo</th>
                    <th width="300px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bairros as $bairro)
                    <tr>
                        <td>{{ $bairro->nome }}</td>
                        <td>{{ $bairro->estado }}</td>
                        <td>{{ $bairro->cidade }}</td>
                        <td>R${{ number_format($bairro->taxa, 2, ',', '.') }}</td>
                        <td>{{ $bairro->ativo == "S" ? "Sim" : "Não" }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.bairro', $bairro->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $bairro->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $bairro->id }}"
                                  action="{{ route('gestor.bairros.destroy', $bairro->id) }}"
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
        {{ $bairros->links() }}
    </div>

@endsection
