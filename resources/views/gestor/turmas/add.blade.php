@extends('layouts.gestor.gestor')

@section('title', 'Turmas - ')
@section('header-title', 'Gerenciar Turmas')


@section('content')
    <div class="col-md-12 mt-2 mt-2">
        <div class="color-palette-set">

            @section('card-tools')
                <button class="fa fa-save btn btn-primary content animate__animated animate__flipInX">
                    Salvar
                </button>
            @endsection

            <div class="color-palette" >
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">*Arquivo CSV</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
