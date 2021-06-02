@extends('layouts.gestor.gestor')

@section('title', 'Turmas - ')
@section('header-title', 'Gerenciar Turmas')


@section('content')
    <form action="{{ route('turmas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">*Arquivo CSV</label>
        <input type="file" name="salas" class="form-control">
        <button type="submit" class="fa fa-save btn btn-primary">Salvar</button>
    </form>
@endsection

