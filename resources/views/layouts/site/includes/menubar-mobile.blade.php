<nav id="main-nav">
    <ul class="second-nav">
        <li>
            <a href="/" style="font-size: 17px;">
                <i class="icofont-home mr-2" style="font-size: 20px;"></i> Início
            </a>
        </li>
        <li>
            <a href="/quem-somos" style="font-size: 17px;">
                <i class="icofont-book mr-2" style="font-size: 20px;"></i> Quem Somos
            </a>
        </li>
    </ul>
    <ul class="bottom-nav">
        <li class="email">
            <a href="/">
                <p class="h5 m-0"><i class="icofont-home text-success"></i></p>
                Início
            </a>
        </li>
        <li class="ko-fi">
            <a href="{{ route('login') }}">
                <p class="h5 m-0"><i class="icofont-user"></i></p>
                Minha conta
            </a>
        </li>
            <li class="github">
                <a href="/meu-carrinho">
                    <p class="h5 m-0"><i class="icofont-cart"></i></p>
                    Carrinho
                </a>
            </li>
    </ul>
</nav>


{{--apaga depois de implementar o if login--}}
{{--<nav id="main-nav">--}}
{{--    <ul class="second-nav">--}}
{{--        <li><a href="/"><i class="icofont-smart-phone mr-2"></i> Início</a></li>--}}
{{--        <li><a href="/"><i class="icofont-smart-phone mr-2"></i> Quem Somos</a></li>--}}

{{--        @if (Auth::check())--}}
{{--            <li><a href="{{ route('user.minha-conta') }}"><i class="icofont-ui-user mr-2"></i> Minha Conta</a></li>--}}
{{--            <li>--}}
{{--                <a href="/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                    <i class="icofont-login mr-2"></i> Sair--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--        @else--}}
{{--            <li><a href="{{ route('login') }}"><i class="icofont-login mr-2"></i> Entrar</a></li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--</nav>--}}
