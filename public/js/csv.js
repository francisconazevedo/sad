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
        }
    });
}
