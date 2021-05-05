@extends('layouts.gestor.gestor')

@section('title', 'Formulário de Categoria de Produtos - ')
@section('header-title', 'Formulário de Categoria de Produtos')

@section('content')
    <livewire:gestor.produto-categoria :id="$id">
@endsection
