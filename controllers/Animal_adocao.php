<?php


class Animal_adocao{
    
    private $id;
    private $nome;
    private $idade;
    private $raca;
    private $porte;
    private $foto;
    private $descricao;
    
    
    /***************************************** GETTERS AND SETTERS *************************************************/
    
    public function getId(){
        return $this->id;
    }
    
    
    public function getNome(){
        return $this->nome;
    }

    
    public function getIdade(){
        return $this->idade;
    }

    
    public function getRaca(){
        return $this->raca;
    }

    
    public function getPorte(){
        return $this->porte;
    }

    
    public function getFoto(){
        return $this->foto;
    }

    
    public function getDescricao(){
        return $this->descricao;
    }    
    
    public function setNome($nome){
        $this->nome = $nome;
    }

    
    public function setIdade($idade){
        $this->idade = $idade;
    }

    
    public function setRaca($raca){
        $this->raca = $raca;
    }

    
    public function setPorte($porte){
        $this->porte = $porte;
    }

    
    public function setFoto($foto){
        $this->foto = $foto;
    }

    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    
    /************************** FIM DOS GETTERS AND SETTERS **********************************************************/
    
    
    public function getAnimalById(){
        
    }
    
}