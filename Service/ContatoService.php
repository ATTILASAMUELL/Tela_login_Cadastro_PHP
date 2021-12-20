<?php

class ContatoService
{
    public function cadastrarContatoService($contato)
    {
      
        //Verifica se os campos obrigatório foram preenchidos
        $campo = $this->verificarCampo($contato->getNome(), "nome");
        if($campo['sucesso'] == false) return $campo;

        $campo = $this->verificarCampo($contato->getCpf(), "cpf");
        if($campo['sucesso'] == false) return $campo;

        $campo = $this->verificarCampo($contato->getEmail(), "email");
        if($campo['sucesso'] == false) return $campo;

        $campo = $this->verificarCampo($contato->getSenha(), "senha");
        if($campo['sucesso'] == false) return $campo;


        $campo = $this->validateCPF($contato->getCpf());
        if($campo['sucesso'] == false) return $campo;

        //Criptografa senha:
        //$contato->setSenha($this->criptografarSHA256($contato->getSenha()));
         
        return array (
            "sucesso" => true

        );
        
    
    
    } 


    // Método pertencente somente a classe ContatoService , por isso o 'private'.

    private function verificarCampo($valorCampo, $nomeCampo)
    {
        //Verifica se o campo foi  preenchido
        if(strcmp($valorCampo, "") == 0)
        {
            return array(
                "mensagem" => "Preencha o campo $nomeCampo",
                "campo" => "#$nomeCampo",
                "sucesso" => false
            );
        }
        
        return array (
            "sucesso" => true

        );
    }

    
    private function validateCPF($cpf)
    {
        // Extrair somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return array(
                "mensagem" => "Campo cpf está com menos de 11 caracter",
                "campo" => "#$cpf",
                "sucesso" => false
            );
   
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return array(
                "mensagem" => "Sequência de digitos repetidos",
                "campo" => "#$cpf",
                "sucesso" => false
            );
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c]* (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return array(
                    "mensagem" => "Campo cpf inválido",
                    "campo" => "#$cpf",
                    "sucesso" => false
                );
            }

        }

        return array (
            "mensagem" => " ",
            "campo" => " ",
            "sucesso" => true

        );

    }

    private function criptografarSHA256($senhaInformada )
    {
        
        //Converte a senha informada para SHA256
        $senhaNova = hash('sha256', $senhaInformada);
            
        $salt = hash('sha256', 'DesB23243533');

        $senhaNova = hash('256', $senhaNova.$salt);
        return $senhaNova;
        


        }

    
    
    
    
   
   
   
   
   
   private function error($codigo, $mensagem)
   {
    $texto = throw new Error($mensagem);
    if ($texto)$texto = "Deu tudo certo!!!";
    
       
    $status = http_response_code($codigo);

    return  array (
        "texto" => $texto,
        "status" => $status

    );
   }
 }

    



?>