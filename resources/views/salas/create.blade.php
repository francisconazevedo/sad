
@extends('layouts.gestor.gestor')

@section('title', 'Salas - ')
@section('header-title', 'Gerenciar Salas')


@section('content')
    <form action="{{ route('salas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">*Arquivo CSV</label>
        <div class="col-md-12">
            <input type="file" name="salas" class="form-control">
        </div>
        <button style="float: right; margin: 13px;" type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
