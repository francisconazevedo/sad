@section('title', "{$produto->nome}")
@section('og:title', $produto->nome)
@section('og:image',(isset($_SERVER['HTTPS']) ? "https" : "http") . "://". $_SERVER['HTTP_HOST'].'/'. $produto->thumbnail )
@section('description', $produto->nome)

@extends('layouts.site.site')

@section('content')
    <livewire:site.pedido.pedido :id="$produto->id">
@endsection
