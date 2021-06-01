@extends('layouts.gestor.gestor')

@section('title', 'Salas - ')
@section('header-title', 'Cadastrar Novo Produto')


@section('content')
    <form action="{{ route('salas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">*Arquivo CSV</label>
        <input type="file" name="salas" class="form-control">
        <button type="submit" class="fa fa-save btn btn-primary">Salvar</button>
    </form>
@endsection
