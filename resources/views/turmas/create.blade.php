@extends('layouts.gestor.gestor')

@section('title', 'Turmas - ')
@section('header-title', 'Gerenciar Turmas')


@section('content')
    <form action="{{ route('turmas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">*Arquivo CSV</label>
        <div class="col-md-12">
            <input type="file" name="turmas" class="form-control">
        </div>
        <button style="float: right; margin: 13px;" type="submit" class="fa fa-save btn btn-primary">Salvar</button>
    </form>
@endsection

