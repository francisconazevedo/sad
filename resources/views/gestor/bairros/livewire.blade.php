@extends('layouts.gestor.gestor')

@section('title', 'Formulário de Bairros para Entrega - ')
@section('header-title', 'Formulário de Bairro para Entrega')

@section('content')
    <livewire:gestor.bairro :id="$id">
@endsection
