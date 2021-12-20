<?php

//Classe POJO => So tem os atributos e métodos GET e SET

/* 
 public function getNome() {
    return $this->nome;
  }
  
  public function setNome($name) {
    $this->nome= $name;
  } 
  
  
  */

class Contato
{
    //Atributos da classe
    private  $id;
    private  $nome;
    private $cpf;
    private $email;
    private $senha;


    // Métodos GET e Set

    public function getNome() {
      return $this->nome;
    }
    
    public function setNome($name) {
      $this->nome= $name;
    } 
  
    public function getCpf() {
      return $this->cpf;
    }
    
    public function setCpf($cpfP) {
      $this->cpf= $cpfP;
    } 


    
    public function getEmail() {
      return $this->email;
    }
    
    public function setEmail($emailP) {
      $this->email= $emailP;
    } 
    public function getSenha() {
      return $this->senha;
    }
    
    public function setSenha($senhaP) {
      $this->senha= $senhaP;
    } 
    
    
    
}