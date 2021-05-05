

totalCarrinho()
function totalCarrinho() {

    $.ajax({
        method: 'get',
        url : "/total-carrinho",

        success: function( response )
        {
            var text = " " + response['qtd'] + " item (s) - R$ " + response['valor']
            $(".texto-carrinho").text(text)
        }
    });
}
//CARRINHO
function atualizaValorItem(idItem, operacao, posicao){
    var quantidade;
    var valor_unico = parseFloat($("#valor-unitario-" + idItem).text().replace(",", ".")).toFixed(2);
    var resultado;

    if (operacao === 'menos') {
        quantidade = $("#quantidade-" + idItem).val() - 1;
        if (quantidade < 1) {
            $("#quantidade-" + idItem).val().text(1);
        }
    } else if (operacao === 'mais') {
        quantidade = parseInt($("#quantidade-" + idItem).val()) + parseInt(1);
    } else {
        quantidade = $("#quantidade-" + idItem).val();
    }
    resultado = (valor_unico * quantidade).toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

    $("#valor-total-" + idItem).text(resultado)
    atualizaSubTotal()
    atualizarSessao(posicao, quantidade);
}
$( 'input[name="enderecos"]:radio' ).on('change', function(e) {
    if(this.id === "retirada"){
        $("#valor-frete").text('--');
    }
    if($(this).prev().val() != undefined) {
        $("#valor-frete").text(($(this).prev().val()).replace(".", ","));
    }
    atualizaTotal()
});

$( 'input[name="customRadioInline1"]:radio' ).on('change', function(e) {
    if(this.id === "retirada"){
        $("#valor-frete").text('--');
    }
    if($(this).prev().val() != undefined) {
        $("#valor-frete").text(($(this).prev().val()).replace(".", ","));
    }
    atualizaTotal()
});

function verificaCampo(campoId){
    var idItem;
    var resultado;
    if($("#"+campoId).val() == "" || $("#"+campoId).val() < 1){
        $("#" + campoId).text(1).val(1);
        idItem = campoId.split('-');
        resultado = parseFloat($("#valor-unitario-" + idItem[1]).text().replace(".", ",")).toFixed(2);
        $("#valor-total-" + idItem[1]).text(resultado)
        atualizaSubTotal()
    }
}
$( 'input[class="qty"]' ).on('change', function(e) {
    var idItem;
    var resultado;
    if(this.value == "" || this.value < 1){
        this.value = 1;
        idItem = (this.id).split('-');

        resultado = parseFloat($("#valor-unitario-" + idItem[1]).text().replace(",", ".")).toFixed(2);
        $("#valor-total-" + idItem).text(resultado)
        atualizaSubTotal()
    }
});
atualizaQuantidade()
atualizaSubTotal();
$('.qtd-carrinho').text(document.getElementsByClassName("att-qtd").length + " ");


function atualizaSubTotal(){
    var soma = 0.00;
    var resultado;
    for(i = 0; i < document.getElementsByClassName("valor").length; i++){
        soma = parseFloat(document.getElementsByClassName("valor")[i].innerText.replace(",", ".")) + parseFloat(soma);
    }
    resultado = (soma).toFixed(2).replace(".", ",");

    $("#subtotal").text(resultado);
    $("#total-itens").text(resultado);
    atualizaTotal()
}

function atualizaQuantidade(){
    var id;
    var idItem;
    var valor_unico;
    var resultado;
    for(i = 0; i < document.getElementsByClassName("att-qtd").length; i++){
        id = document.getElementsByClassName("att-qtd")[i].id;
        idItem = id.split('-');

        valor_unico = parseFloat($("#valor-unitario-" + idItem[1]).text().replace(",", ".")).toFixed(2);
        resultado = (valor_unico * document.getElementsByClassName("att-qtd")[i].value).toFixed(2).replace(".", ",");

        $("#valor-total-" + idItem[1]).text(resultado)
    }
    $('.qtd-carrinho').text(" " + document.getElementsByClassName("att-qtd").length + " ");

}

function atualizaTotal() {
    var resultado_com_frete;
    var resultado_sem_frete;
    var valor_itens = parseFloat($("#subtotal").text().replace(",", ".")).toFixed(2);
    var frete = $("#valor-frete").text();

    if (frete == '--') {
        resultado_sem_frete = parseFloat(valor_itens).toFixed(2).replace(".", ",");
        $("#valor-total").text(resultado_sem_frete);
    } else {
        frete = parseFloat($("#valor-frete").text().replace(",", ".")).toFixed(2);
        resultado_com_frete = (parseFloat(frete) + parseFloat(valor_itens)).toFixed(2).replace(".", ",");
        $("#valor-total").text(resultado_com_frete);
    }
    $('.qtd-carrinho').text(" " + document.getElementsByClassName("att-qtd").length + " ");


}

function criarAlerta(title, summary, details, severity, dismissible, autoDismiss, appendToId) {
    var iconMap = {
        info: "fa fa-info-circle",
        success: "fa fa-thumbs-up",
        warning: "fa fa-exclamation-triangle",
        danger: "fa ffa fa-exclamation-circle"
    };

    var iconAdded = false;

    var alertClasses = ["alert", "animated", "flipInX"];
    alertClasses.push("alert-" + severity.toLowerCase());

    if (dismissible) {
        alertClasses.push("alert-dismissible");
    }

    var msgIcon = $("<i />", {
        "class": iconMap[severity] // you need to quote "class" since it's a reserved keyword
    });

    var msg = $("<div />", {
        "class": alertClasses.join(" ") // you need to quote "class" since it's a reserved keyword
    });

    if (title) {
        var msgTitle = $("<h4 />", {
            html: title
        }).appendTo(msg);

        if(!iconAdded){
            msgTitle.prepend(msgIcon);
            iconAdded = true;
        }
    }

    if (summary) {
        var msgSummary = $("<strong />", {
            html: summary
        }).appendTo(msg);

        if(!iconAdded){
            msgSummary.prepend(msgIcon);
            iconAdded = true;
        }
    }

    if (details) {
        var msgDetails = $("<p />", {
            html: details
        }).appendTo(msg);

        if(!iconAdded){
            msgDetails.prepend(msgIcon);
            iconAdded = true;
        }
    }


    if (dismissible) {
        var msgClose = $("<span />", {
            "class": "close", // you need to quote "class" since it's a reserved keyword
            "data-dismiss": "alert",
            html: "<i class='fa fa-times-circle'></i>"
        }).appendTo(msg);
    }

    $('#' + appendToId).prepend(msg);

    if(autoDismiss){
        setTimeout(function(){
            msg.addClass("flipOutX");
            setTimeout(function(){
                msg.remove();
            },1000);
        }, 1000);
    }
}

function adcNoCarrinho(idProduto) {
    $("#botao-"+idProduto).css('display', 'none');
    $("#botao-"+idProduto).next().css('display', 'block');
    $.ajax({
        method: 'get',
        url : "/adc-no-carrinho",
        data: {id: idProduto,
                qtd: $("#quantity" + idProduto).val(),
        },
        success: function( response )
        {
            if (response === '1') {
                totalCarrinho();
                criarAlerta('Sucesso!', '', 'Item adicionado no carrinho.', 'success', true, true, 'pageMessages');
            } else {
                criarAlerta('Ops!', '', 'Item já está no carrinho.', 'warning', true, true, 'pageMessages');
            }
            $("#botao-"+idProduto).next().css('display', 'none');
            $("#botao-"+idProduto).css('display', 'block');
        }
    });
}

function atualizarSessao(posicao, quantidade){
    $.ajax({
        method: 'get',
        url: "/editar-carrinho",
        data: {
            posicao: posicao,
            quantidade: quantidade,
        },
        success: function (response) {
            // console.log(response);
        }
    });
}
$('.deletar').on('click', function () {
    var idItem;
    var check = confirm('Tem certeza que quer remover esse item do carrinho?');
    if (check == true) {
        document.getElementById('setOpacity').style.opacity = "0.4";

        idItem = (this.id).split('-');
        $.ajax({
            method: 'get',
            url : "/deletar-no-carrinho",
            data: {
                posicao: idItem[1],
            },
            success: function( response )
            {
                atualizaSubTotal()
                totalCarrinho()
                document.getElementById('div-'+idItem[1]).remove()
                document.getElementById('setOpacity').style.opacity = "1";
                atualizaSubTotal()

            }
        });
    }
    else {
        return false;
    }
});

$("#finalizar").on('click', function(e) {
    if(sessionStorage.getItem('delivery') == 'true'){
        if(! $('input[name="enderecos"]:checked').val()){
            alert('Nenhum endereço selecionado, se necessário cadastre um novo endereço em "Minha conta"')
            return false;
        }
    }else {
        $('input[name="enderecos"]:checked').val("")
    }
    if($('input[name="customRadioInline1"]:checked').val() == undefined){
        alert('Selecione a forma de entrega!')
        return false;
    }
    if(document.getElementsByClassName("att-qtd").length == 0){
        alert('Carrinho vazio!')
        return false;
    }
    $.ajax({
        method: 'get',
        url : "/finalizar",
        data: {
            pagamento: $('input[name="radioPagamento"]:checked').val(),
            endereco: $('input[name="enderecos"]:checked').val(),
            forma_entrega: $('input[name="customRadioInline1"]:checked').parent().text().trim(),
            frete: $( 'input[name="enderecos"]:radio').val(),
        },
        success: function( response )
        {
            sessionStorage.clear();
            let a = document.createElement('a');
            a.href= response;
            a.click();

        }
    });
})

$( "#redirect-login" ).on('click', function(e) {
    window.location.href = "/login"
});

function redLogin(){
    window.location.href = "/login"
}
function abreEnderecos(){
    $("#abreEnderecos").css('display', 'contents')
    sessionStorage.setItem('delivery', 'true');
}

function escondeEnderecos(){
    $("#abreEnderecos").css('display', 'none')
    $('input[name="enderecos"]').prop( "checked", false );
    sessionStorage.setItem('delivery', 'false');

}
buscaEstados()

function buscaEstados() {
    $.ajax({
        method: 'get',
        url: "/lista-estados",
        success: function (response) {
            console.log(response);
            $('#uf').empty();
            var string = [`<option value="">--Todos--</option>`];

            for (i = 0; i < response.length; i++) {
                if (sessionStorage.getItem("uf-valor") == response[i]) {
                    string += [`<option value="${response[i]}" selected>${response[i]}</option>`];

                } else {
                    string += [`<option value="${response[i]}">${response[i]}</option>`];
                }
            }
            $('#uf').append(string);
            if (sessionStorage.getItem("cidade-valor")) {
                $("#cidade").val(sessionStorage.getItem("cidade-valor"))
                buscaCidades();
            }
        }
    });
}

function buscaCidades() {
    $.ajax({
        method: 'get',
        url: "/../lista-cidades/" + $("#uf").val(),
        success: function (response) {
            $('#cidade').empty();
            var string = [`<option value="">--Todos--</option>`];

            for (i = 0; i < response.length; i++) {
                if (sessionStorage.getItem("cidade-valor") == response[i]) {
                    string += [`<option value="${response[i]}" selected>${response[i]}</option>`];

                } else {
                    string += [`<option value="${response[i]}">${response[i]}</option>`];
                }
            }
            $('#cidade').append(string);

            if (sessionStorage.getItem("bairro-valor")) {
                buscaBairros();
            }
        }
    });
}

function buscaBairros() {
    $.ajax({
        method: 'get',
        url: "/../lista-bairros/" + $('#cidade').val(),
        success: function (response) {
            $('#bairro_id').empty();
            var string = [`<option value="">--Todos--</option>`];

            for (i = 0; i < response.length; i++) {
                if (sessionStorage.getItem("bairro-valor") == response[i]['id']) {
                    string += [`<option value="${response[i]['id']}" selected>${response[i]['nome']}</option>`];
                } else {
                    string += [`<option value="${response[i]['id']}">${response[i]['nome']}</option>`];
                }
            }
            $('#bairro_id').append(string);
        }
    });
}

$('#uf').on('change', function () {
    $('#bairro_id').val("");
    $('#cidade').val("");
    buscaCidades()
    sessionStorage.setItem('uf-valor', $('#uf').val());
})
$('#cidade').on('change', function () {
    $('#bairro_id').val("");
    buscaBairros()
    sessionStorage.setItem('cidade-valor', $('#cidade').val());

})
$('#bairro_id').on('change', function () {
    sessionStorage.setItem('bairro-valor', $('#bairro_id').val());
})

if (sessionStorage.getItem("uf-valor")) {
    $("#uf").val(sessionStorage.getItem("uf-valor"))
    buscaEstados();
}
