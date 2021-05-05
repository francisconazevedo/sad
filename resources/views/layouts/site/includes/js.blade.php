<livewire:scripts/>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js?"></script>

<script src="{{ asset('site/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- slick Slider JS-->
<script src="{{ asset('site/vendor/slick/slick.min.js') }}"></script>
<!-- Sidebar JS-->
<script src="{{ asset('site/vendor/sidebar/hc-offcanvas-nav.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('site/js/osahan.js') }}"></script>
<script src="{{ asset('site/js/site.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous"></script>
<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/notify.js') }}"></script>


@if(Session::has('notify') || Session::has('error'))
    <script>
        $(document).ready(function () {
            @if(Session::has('notify'))
            notificar({type: 'success', message: "{{ Session::get('notify') }}"});
            @elseif(Session::has('error'))
            notificar({type: 'error', message: "{{ Session::get('error') }}"});
            @endif
        })
    </script>
@endif

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VRE579H3TB"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VRE579H3TB');
</script>

@yield('script')
