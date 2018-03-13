<?php

class Animal_perdido{

    private $nome;
    private $descricao;
    private $tipoAnimal;
    private $idade;
    private $foto;
    private $porte;
    private $localPerdido;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($alteracao){
        $this->nome = $alteracao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($alteracao){
        $this->descricao = $alteracao;
    }

    public function getTipoAnimal(){
        return $this->tipoAnimal;
    }

    public function setTipoAnimal($alteracao){
        $this->tipoAnimal = $alteracao;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($alteracao){
        $this->idade = $alteracao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($alteracao){
        $this->foto = $alteracao;
    }

    public function getPorte(){
        return $this->porte;
    }

    public function setPorte($alteracao){
        $this->porte = $alteracao;
    }

    public function getLocalPerdido(){
        return $this->localPerdido;
    }

    public function setLocalPerdido($local){
        $this->localPerdido = $local;
    }

}