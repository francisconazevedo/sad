@section('title', 'Editar Endereço - ')
@section('header-title', 'Editar Endereço')
@extends('layouts.site.site')

@include('user.enderecos._form', ['route' => route('user.meus-enderecos.update', $endereco), 'method' => 'PUT'])
