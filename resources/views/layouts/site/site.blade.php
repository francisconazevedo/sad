<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="author" content="wetech.com.br">
    <link href="{{ asset('images/logo-site.png') }}" rel="icon" type="image/png"/>

    <title>@yield('title') | {{ config('app.name') }}</title>

    @include('layouts.site.includes.share-tags')
    @include('layouts.site.includes.style')
</head>
<body class="fixed-bottom-padding">
<script>
    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    function preload(el, interval){
        var op = 1;
        var timer = setInterval(function () {
            if (op <= 0.1){
                clearInterval(timer);
                el.style.display = 'none';
                el.className = '';
            }
            el.style.opacity = op;
            op -= op * 0.1;
        }, interval);
    }
    var div = document.createElement('div');

    if(!readCookie('naoMostrar')){
        div.setAttribute('class', 'preload'); // and make sure myclass has some styles in css
        div.setAttribute('id', 'preload'); // and make sure myclass has some styles in css
        document.body.appendChild(div);
        preload(div, 150);
        createCookie('naoMostrar', true, 1000)
    }
</script>

@include('layouts.site.includes.navbar-mobile')

<div class="bg-white shadow-sm osahan-main-nav">

    @include('layouts.site.includes.navbar')
    @include('layouts.site.includes.menubar')
</div>

<section class="py-4 osahan-main-body">
    <div class="container">

        @yield('content')
    </div>

    @yield('content-out')
</section>

@include('layouts.site.includes.menubar-mobile')
@include('layouts.site.includes.footer')
@include('layouts.site.includes.js')
</body>
</html>
