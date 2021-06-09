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
            console.log(response);
            for (i = 0; i < response.length; i++) {
                var acessivel;
                if (response[i]['acessivel'] == 1) {
                    acessivel = "<i class='fa fa-check'></i>"
                } else {
                    acessivel = "<i class='fas fa-times'></i>"
                }
                string += [`<tr>
                                <td><input type="radio" required name="sala" value="${response[i]['id_sala']}"></td>
                                <td id="sala_sala">${response[i]['id_sala']}</td>
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

function submitFormSala(){
    var string = "";
    sala = $("input[type='radio'][name='sala']:checked").val();
    horario = $('#horario_id').text()
    turma = $('#turma_id').text()
    $('#editaSala').empty();
    string += [`
                <input type="hidden" id="id_turma" name="id_turma" value="${turma}">
                <input type="hidden" id="id_sala" name="id_sala" value="${sala}">
                <input type="hidden" id="horario" name="horario" value="${horario}">
            `];
    $('#editaSala').append(string);

    // SÓ DESCOMENTAR QND A FUNÇÃO DE EDITAR ESTIVER PRONTA
    // $('#editaSala').submit();

}

//triggered when modal is about to be shown
$('#exampleModalCenter').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookId = $(e.relatedTarget).data('turma');
    //populate the textbox
    $("#turma_id").text(bookId);
});
