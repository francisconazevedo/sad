@section('title', 'Cadastrar Endereço - ')
@section('header-title', 'Cadastrar Endereço')
@extends('layouts.site.site')

@include('user.enderecos._form', ['route' => route('user.meus-enderecos.store'), 'method' => 'POST'])
