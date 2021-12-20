
<?php

interface IContatoDAO
{

    public function conexao($contato);
    public function salvar($contato);

    public function deletar($contato);

    public function alterar($contato);

    public function buscar($contato);


}




?>