<?php

//Inicia a Sessão

session_start();

// 1.Cadastrar


if(isset($_POST['cadastrar'])){
    cadastrarContato();


    //2.
}else{
    header('Location: ../View/cadastro.php');
    

}

//FUNCTIONS



function cadastrarContato()
{
    // Inclui os arquivos (Model)
    include_once "../Model/Contato.php";
    include_once "../Service/ContatoService.php";

    //Retorno do Json (Validação)
    header('Content-Type: application/json');

    //Guarda os dados informados no formulário

    $emailP = $_POST['email'];
    $senhaP  =  $_POST['senha'];
    $nomeP =  $_POST['nome'];
    $cpfP = $_POST['cpf'];

    // Cria os objetos da classes Contato e ContatoService

    $contato =  new  Contato();
    $contatoService = new ContatoService();
    //Preenche o objeto com os dados informados

    $contato->setNome($nomeP);
    $contato->setCpf($cpfP);
    $contato->setEmail($emailP);
    $contato->setSenha($senhaP);



    

    
    

    // Enviar o objeto para efetuar o cadastro
    $response = $contatoService->cadastrarContatoService($contato);

    

    //Verificar o tipo de retorno

    if($response['sucesso']){
        //Mostrar mensagem de sucesso
        print json_encode(array(
            'mensagem' => 'seja bem vindo',
            'codigo' => 1
            
        ));
        exit();

    }else{
        print json_encode(array(
            'mensagem' =>$response['mensagem'],
            'codigo' => 0,
            'campo' =>$response['campo']
        ));
        exit();

    }
    
}