<div class=" container border-bottom p-3 d-none mobile-nav">
    <div class="title d-flex align-items-center">
        <a href="/" class="text-decoration-none text-dark d-flex align-items-center">
            <img class="osahan-logo mr-2" src="{{ asset('images/logo-site.png') }}" alt="{{ config('app.name') }}">
        </a>
        <p class="ml-auto m-0">
        </p>
        <div class="col-md-6">
            <form accept-charset="UTF-8" method="GET" action="/">
                <div class="input-group rounded shadow-sm overflow-hidden bg-white">

                    <div class="input-group-prepend">
                        <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i>
                        </button>
                    </div>

                    <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Buscar..." name="busca"
                           value="{{ request()->query('busca') }}">
                </div>
            </form>
        </div>

        <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
    </div>
    <div class="col-md-12 botao-carrinho">
        <a class="ml-auto col-md-4" href="#">
            <button onclick="location.href='/meu-carrinho'" style="font-size: 14px; width: 55%; float: right;"  type="button" class="qtyplus btn btn-success btn-sm"><i class="icofont-shopping-cart"></i><span class="texto-carrinho"></span></button>
        </a>
    </div>
</div>
