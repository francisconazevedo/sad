@extends('layouts.gestor.gestor')

@section('title', 'Formulário Acompanhamento - ')
@section('header-title', 'Formulário Acompanhamento')

@section('content')
    <livewire:gestor.acompanhamento :id="$id">
@endsection
