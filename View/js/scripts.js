
function cadastrarContato() {
    
    dados = {
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'nome': $('#nome').val(),
        'cpf': $('#cpf').val(),
        'cadastrar': $('#cadastrar').val()
    }

    

    // Mostra o Loading
    carregarModalLoading();

    //Envia e recebe os dados do Back-End(PHP), VIA AJAX (Assincrona):
    $.ajax({
        url: 'http://localhost/agenda/Controller/contatoController.php',
        type:'POST',
        data: dados,
        success: function(data){
            setTimeout(function(){
                esconderModalLoading();
                $('#status').text(data.mensagem)
                 

                //Verificar o codigo retornado:
                if( data.codigo == 1){
                    $('#status').css({
                        "color": "#f1c40f"
                    });
                    var urll = "http://localhost/agenda/View/home.php";
                    window.location.href = urll;
                    

                    //Redirecionar para o index, depois do Delay
                    setTimeout(function() {
                        var urll = "http://localhost/agenda/View/home.php";
                        window.location.href = urll;
                        console.log(urll)
                        

                    },2000 )

                    

                } else{
                    
                    $(data.campo).focus();

                    $('#status').css({
                        "color": "#ff6f65"
                    });

                }



            },1000); // Esse milisegundo (1000) é tempo em milisegundo
        },
        error: function(){
            $('#status').text("Error ao conectar com servidor!!!");
            $('#status').css({
                "color": "#ff6f65"
            });

        }

    })
}

function carregarModalLoading() {
    $('#modalLoading').css({
        "display": "block"
    });
}

function esconderModalLoading(){
    $('#modalLoading').css({
        "display": "none"
    });

}