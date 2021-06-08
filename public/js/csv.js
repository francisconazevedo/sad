function getData(id){
    $.ajax({
        method: 'get',
        url: "/salasPossiveis",
        data: {
            acessibilidade: $('#acessibilidade'+id).text(),
            numero_cadeiras: $('#numero_alunos'+id).text(),
            qualidade: $('#qualidade'+id).text()
        },
        success: function (response) {
            console.log(response)
            var string = "";
            $('#tabelaSalas').empty();

            for(i=0;i<response.length;i++) {
                var acessivel;
                if (response[i]['acessivel'] == 1) {
                    acessivel = "<i class='fa fa-check'></i>"
                } else {
                    acessivel = "<i class='fas fa-times'></i>"
                }
                string += [`<tr>
                                <td><input type="radio" name="sala" value="${response[i]['id_sala']}"></td>
                                <td>${response[i]['id_sala']}</td>
                                <td>${response[i]['numero_cadeiras']}</td>
                                <td>${acessivel}</td>
                                <td>${response[i]['qualidade']}</td>
                            </tr>
                        `];
            }
            $('#tabelaSalas').append(string);
        }
    });
}


function dadosSalas(id){
    $.ajax({
        method: 'get',
        url: "/sala/"+id,
        success: function (response) {
            console.log(response)
            $('#sala_id').text(id);
            var string = "";
            $('#tabelaSala').empty();

            for (i = 0; i < response.length; i++) {
                var acessivel;
                if (response[i]['acessivel'] == 1) {
                    acessivel = "<i class='fa fa-check'></i>"
                } else {
                    acessivel = "<i class='fas fa-times'></i>"
                }
                string += [`<tr>
                                <td>${response[i]['numero_cadeiras']}</td>
                                <td>${acessivel}</td>
                                <td>${response[i]['qualidade']}</td>
                            </tr>
                        `];
            }
            $('#tabelaSala').append(string);
        }
    });
}
