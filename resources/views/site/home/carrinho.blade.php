@extends('layouts.site.site')
@section('title', 'Meu Carrinho')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb mb-0">
        <div class="container">
            <ol class="d-flex align-items-center mb-0 p-0">
                <li class="breadcrumb-item"><a href="/" class="text-success">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Meu Carrinho</li>
            </ol>
        </div>
    </nav>
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">

                        <div id="setOpacity" class="card border-0 osahan-accor rounded shadow-sm overflow-hidden">
                            <div class="card-header bg-white border-0 p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="c-number">1</span> Carrinho
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body p-0 border-top">
                                    <div class="osahan-cart">
                                        @foreach($carrinho as $key => $item)
                                            <script>
                                                if (! sessionStorage.getItem('campo' + {{ $item['id'] }})) {
                                                    sessionStorage.setItem('campo' + {{ $item['id'] }}, {{ $item['qtd'] }});
                                                }
                                            </script>
                                            <div id="div-{{ $key }}" class="cart-items bg-white position-relative border-bottom">
                                                <a class="deletar" id="deletar-{{ $key }}"><i class="fa fa-trash trash-carrinho"></i></a>
                                                <div class="d-flex  align-items-center p-3">
                                                <a href="/">
                                                    <img src="storage/app/{{ $item['imagem'] }}" class="img-fluid"></a>
                                                <div class="ml-3 text-dark text-decoration-none w-100">
                                                        <h5 class="mb-1" style="font-size: 16px;">{{ $item['nome'] }}</h5>
                                                    <p class="text-muted mb-2">R$ <span class="valor-unitario" id="valor-unitario-{{ $item['id'] }}">{{ str_replace(".", ',',$item['valor']) }}</span></p>
                                                    <div class="d-flex align-items-center">
                                                        <p class="total_price font-weight-bold m-0">R$ <span class="valor" id="valor-total-{{ $item['id'] }}">{{ str_replace(".", ',',$item['valor']) }}</span></p>
                                                        <form id="myform" class="cart-items-number d-flex ml-auto" method="POST" action="#">
                                                            <button onclick="atualizaValorItem({{ $item['id'] }}, 'menos', {{$key}})" type="button" class="qtyminus btn btn-success btn-sm" field="quantidade-{{ $item['id'] }}">-</button>
                                                            <input onkeyup="atualizaValorItem({{ $item['id'] }}, '', {{$key}})" onblur="verificaCampo('quantidade-{{ $item['id'] }}')" type="number" id="quantidade-{{ $item['id'] }}" name="quantidade-{{ $item['id'] }}" value="{{ $item['qtd'] }}" class="att-qtd qty form-control">
                                                            <button onclick="atualizaValorItem({{ $item['id'] }}, 'mais', {{$key}})" type="button" class="qtyplus btn btn-success btn-sm" field="quantidade-{{ $item['id'] }}">+</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div>
                                            <a href="#" style="display: contents" class="text-decoration-none btn btn-block p-3" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                                <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                                                    <div class="more">
                                                        <h6 class="m-0">Subtotal R$ <span id="subtotal"></span></h6>
                                                        <p class="small m-0">Clique para continuar</p>
                                                    </div>
                                                    <div class="ml-auto"><i class="icofont-simple-right"></i></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                            <div class="card-header bg-white border-0 p-0" id="headingtwo">
                                <h2 class="mb-0">
                                    <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                        <span class="c-number">2</span>Formas de Entrega
                                    </button>
                                </h2>
                            </div>

                            <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExample">
                                <div class="card-body p-0 border-top">
                                    <div class="osahan-order_address">
                                        <div class="p-3 row">
                                            @foreach($entregas as $entrega)
                                                <div class="col-md-12">
                                                    <input @if (Auth::check()) <?= $entrega->informar_endereco == 1 ? 'onclick="abreEnderecos()"' : "" ?>
                                                    <?= $entrega->informar_endereco == 0 ? 'onclick="escondeEnderecos()"' : "" ?>
                                                           @else <?= $entrega->informar_endereco == 1 ? 'onclick="redLogin()" ' : "" ?>
                                                           @endif
                                                    type="radio" <?= $entrega->informar_endereco == 0 ? "id='retirada'" : "" ?> name="customRadioInline1" style=" margin-top: 4px;">
                                                    <label for="retirada{{ $entrega->nome }}" style="margin-left: 10px; font-size: 15px; font-weight: 700; font-family: MONOSPACE; text-transform: uppercase;">{{ $entrega->nome }} </label> @if (! Auth::check())<span><?= $entrega->informar_endereco == 1 ? " (Para informar o endereço é necessário fazer login)" : "" ?></span>@endif<br>
                                                </div>
                                            @endforeach
                                            @if (Auth::check())
                                                <div  id="abreEnderecos" style="display: none" >
                                                @foreach ( Auth::user()->addresses() as $key => $endereco)
                                                    <div class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">
                                                        <input type="hidden" id="frete{{ $endereco['id'] }}" value="{{ $endereco['frete'] }}">
                                                        <input type="radio" value="{{ $endereco['id'] }}" id="customRadioInline{{ $endereco['id'] }}" <?= $endereco['ativo'] == 'S'? "" : "disabled" ?> name="enderecos" class="custom-control-input" >
                                                        <label class="custom-control-label w-100" for="customRadioInline{{ $endereco['id']  }}">
                                                            <div>
                                                                <div class="p-3 bg-white rounded shadow-sm w-100" <?= $endereco['ativo'] == 'S' ? "" : "style='background-color: #dddee0 !important;'" ?>>
                                                                    <div class="d-flex align-items-center mb-2">
                                                                        <p class="mb-0 h6">{{ $endereco['bairro'] }}   </p>
                                                                        <p class="mb-0"><?= $endereco['frete'] ? "" : "<p class='mb-0' style='margin-left: 10px;'>(Bairro indisponível para entrega)" ?></p>
                                                                    </div>
                                                                    <p class="small text-muted m-0">{{ $endereco['endereco'] }}, n° {{ $endereco['numero'] }}</p>
                                                                    <p class="small text-muted m-0">{{ $endereco['cidade'] }}-{{ $endereco['uf'] }}</p>
                                                                    <p class="pt-2 m-0 text-right"><span class="small"><a href="/user/meus-enderecos/{{ $endereco['id']}}/edit" onclick="javascript:sessionStorage.setItem('redirect-carrinho', 'true');" class="text-decoration-none text-info">Editar</a></span></p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                </div>
                                            @endif
                                            <a href="#" class="btn btn-success btn-lg btn-block mt-3" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">

                            <div class="card-header bg-white border-0 p-0" id="headingthree">
                                <h2 class="mb-0">
                                    <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                        <span class="c-number">3</span> Forma de Pagamento
                                    </button>
                                </h2>
                            </div>

                            <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExample">
                                <div class="card-body p-0 border-top">
                                    <div class="mt-1"></div>
                                    @foreach($pagamentos as $key => $pagamento)
                                        <div class="custom-control col-lg-12 custom-radio mb-3 position-relative border-custom-radio">
                                        <input type="radio" value="{{$pagamento->id}}" id="radioPagamento{{$pagamento->id}}" <?= $key == 0 ? 'checked' : '' ?> name="radioPagamento" class="custom-control-input">
                                        <label class="custom-control-label w-100" for="radioPagamento{{$pagamento->id}}">
                                            <div>
                                                <div class="p-3 bg-white rounded shadow-sm w-100">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 h6">{{ $pagamento->nome }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    @endforeach
                                    <div class="p-3">
                                        <a href="#" id="finalizar" class="btn btn-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">Finalizar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sticky_sidebar">
                        <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">

                            <div>
                                <div class="bg-white p-3 clearfix">
                                    <p class="font-weight-bold small mb-2">Detalhes</p>
                                    <p class="mb-1">Total de Itens <span class="small text-muted">(<span class="qtd-carrinho"></span> item(s)<span>)</span> <span class="float-right text-dark">R$ <span id="total-itens"></span></span></p>
                                    <p class="mb-3">Frete<span class="float-right text-dark">R$ <span id="valor-frete">--</span></span></p>
                                </div>
                                <div class="p-3 border-top">
                                    <h5 class="mb-0">TOTAL A PAGAR <span class="float-right text-danger">R$ <span id="valor-total"></span></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.home._whatsapp')
@endsection

<script>
    if(performance.navigation.type == 2){
        location.reload(true);
    }
    sessionStorage.setItem('redirect-carrinho', 'false');
</script>
