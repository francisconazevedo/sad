<!-- Nav bar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container">
    <a class="navbar-brand mr-0" href="/">
        <img class="img-fluid logo-img animate__animated animate__pulse"
             src="{{ asset('images/logo-site.png') }}" alt="{{ config('app.name') }}">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="ml-3 d-flex align-items-center col-md-4">
        <ul class="list-unstyled form-inline mb-0">
            <li class="nav-item active">
                <a class="nav-link text-vermelho pl-0" href="/">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-vermelho pl-0" href="/quem-somos">Quem Somos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-vermelho pl-0" href="/#contato">Contato <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <!-- search  -->
    <div class="col-md-4">
        <form accept-charset="UTF-8" method="GET" action="/">
            <div class="input-group mr-sm-2 col-lg-12">
                <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                       placeholder="Buscar..." name="busca" value="{{ request()->query('busca') }}">
                <div class="input-group-prepend">
                    <button class="btn btn-success rounded-right"><i class="icofont-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <a class="ml-auto" href="#">
            <button onclick="location.href='/meu-carrinho'" style="font-size: 13px; width: 100%; float: right;"  type="button" class=" qtyplus btn btn-success btn-sm"><i class="icofont-shopping-cart"></i><span class="texto-carrinho"></span></button>
        </a>
    </div>
    <div class="ml-auto d-flex align-items-center">
        @if (Auth::check())
            <div class="dropdown mr-3">
                <a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Olá {{ Auth::user()->firstName() }}
                </a>
                <div class="dropdown-menu dropdown-menu-right top-profile-drop" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('user.minha-conta') }}">Minha Conta</a>
                    <a class="dropdown-item" href="/"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        @else

        <!-- login/signup -->
            <span style="padding-right: 5px; font-weight: bold">Entrar</span>
            <a href="{{ route('login') }}"
               class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
                <i class="icofont-login"></i>
            </a>

        @endif
    </div>
</nav>
