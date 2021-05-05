<div class="title d-flex align-items-center py-3">
    <h5 class="m-0">Produtos</h5>
</div>
<div id="pageMessages" style="width: 41%;float: right"></div>

<div class="pick_today">
    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-6 col-md-3 mb-3 produto-{{ $produto->id }}">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <div class="p-1">
                        <a href="produto/{{$produto->slug}}/{{$produto->id}}">
                                <img style="object-fit: contain" src="storage/app/{{ $produto->foto }}"
                                     class=" imagem-produtos-home img-fluid item-img w-100 mb-3">
                        </a>
                            <a style="color: inherit;" href="produto/{{$produto->slug}}/{{$produto->id}}"><h6 style="height: 38px;font-size: 15px;">{{ strlen($produto->nome) > 30 ? substr($produto->nome,0,30)."..." : $produto->nome }}</h6></a>
                            <div class="d-flex align-items-center">
                                <div style="display: flex; width: 100%;">
                                    <div style="align-self: center;">
                                        <a href="/" class="text-dark">
                                            <h6 class="price m-0 text-success">R$ {{ str_replace(".", ",", $produto->preco) }}</h6>
                                        </a>
                                    </div>
                                    <div style="float: right; margin-left: auto; margin-right: 0;">
                                        <form class="cart-items-number d-flex" method="POST" action="#">
                                            <input type="button" value="-" class="qtyminus btn btn-success btn-sm" field="quantity{{ $produto->id }}">
                                            <input type="text" name="quantity{{ $produto->id }}" id="quantity{{ $produto->id }}" value="1" class="qty form-control">
                                            <input type="button" value="+" class="qtyplus btn btn-success btn-sm" field="quantity{{ $produto->id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="ml-auto col-md-4" href="#">
                                    <input style="width: 100%; float: right; font-family: 'Ubuntu', sans-serif !important;" id="botao-{{ $produto->id }}" onclick="adcNoCarrinho({{ $produto->id }})" type="button" value="Adicionar" class="icofont-cart mb-2 qtyplus btn btn-success btn-sm">
                                    <img src="/gif/gif-botao.gif" style="display: none; width: 23%; margin: 0 auto;">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
