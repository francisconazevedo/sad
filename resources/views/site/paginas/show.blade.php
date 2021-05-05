@section('title', "$pagina->titulo - ")
@section('og:title', $pagina->titulo)
@section('description', $pagina->titulo)

@extends('layouts.site.site')

@section('content')
    @include('layouts.site.includes.banner', ['nome' => $pagina->titulo])

    <section class="welcome-section section-padding">
        <div class="container">
            <div class="section-title">
                <p>
                    {!! $pagina->conteudo !!}
                </p>
            </div>

        </div>
    </section>
@endsection
