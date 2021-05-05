@extends('layouts.site.site')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb mb-0">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="/" class="text-success">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quem Somos</li>
            </ol>
        </div>
    </nav>
    <section class="py-4 osahan-main-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="osahan-promo overflow-hidden rounded shadow-sm bg-white">
                        <div class="promo_detail">
                            <div class="title p-3 bg-white shadow-sm d-flex align-items-center">
                                <div class="title">
                                    <h3 class="font-weight-bold text-vermelho" style="font-size: 18px;">Quem Somos</h3>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="titulo-texto-sobre">História da Empresa</h4>
                                <p class="font-weight-bold mb-2">
                                    {{ $configuracao->historia_empresa }}
                                </p>
                                <h4 class="titulo-texto-sobre">Missão</h4>
                                <p class="font-weight-bold mb-2">
                                    {{ $configuracao->missao }}
                                </p>
                                <h4 class="titulo-texto-sobre">Visão</h4>
                                <p class="font-weight-bold mb-2">
                                    {{ $configuracao->visao }}
                                </p>
                                <h4 class="titulo-texto-sobre">Valores</h4>
                                <p class="font-weight-bold mb-2">
                                    {{ $configuracao->valores }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @include('site.home._whatsapp')
@endsection
