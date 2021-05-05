@extends('layouts.site.site')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- home page -->
            <div class="osahan-home-page">
                <!-- body -->
                <div class="container osahan-body">
                    @include('site.home._slide')
                    @include('site.home._produtos')
                </div>
            </div>
        </div>

        @include('site.home._whatsapp')
    </div>
@endsection
