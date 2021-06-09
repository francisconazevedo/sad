function getData(id, horario){
    $.ajax({
        method: 'get',
        url: "/salasPossiveis",
        data: {
            acessibilidade: $('#acessibilidade'+id).text(),
            numero_cadeiras: $('#numero_alunos'+id).text(),
            qualidade: $('#qualidade'+id).text(),
            horario: horario
        },
        success: function (response) {
            var string = "";
            $('#tabelaSalas').empty();
            $('#horario_id').text(horario);

            for (i = 0; i < response.length; i++) {
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
            if (response.length == 0) {
                string += [`<td colspan="5" style="font-style: italic;">Não tem sala disponível para o horário solicitado</td>`];
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

            var string = "";
            $('#tabelaTurma').empty();
            for (i = 0; i < response[0]['horarios_ocupados'].length; i++) {
                string += [`<tr>
                                <td>${response[0]['horarios_ocupados'][i]['id_turma'][0]['disciplina']}</td>
                                <td>${response[0]['horarios_ocupados'][i]['id_turma'][0]['professor']}</td>
                                <td>${response[0]['horarios_ocupados'][i]['id_turma'][0]['curso']}</td>
                                <td>${response[0]['horarios_ocupados'][i]['id_turma'][0]['periodo']}</td>
                                <td>${response[0]['horarios_ocupados'][i]['horario']}</td>
                            </tr>
                        `];
            }
            $('#tabelaTurma').append(string);

        }
    });
}
