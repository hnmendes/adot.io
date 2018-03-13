<?php


abstract class Animal{

	private $id;
	private $nome;
	private $raca;
	private $porte;
	private $idade;
	private $foto;
	private $tipo;
	private $descricao;
	private $usuario_id;
	private $cidade;
	private $estado;

// GETTERS AND SETTERS *******************************************************************************************************

	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id = $id;
	}


	public function getNome(){
		return $this->nome;
	}


	public function setNome($nome){
		$this->nome = $nome;
	}


	public function getRaca(){
		return $this->raca;
	}


	public function setRaca($raca){
		$this->raca = $raca;
	}


	public function getPorte(){
		return $this->porte;
	}


	public function setPorte($porte){
		$this->porte = $porte;
	}


	public function getFoto(){
		return $this->foto;
	}


	public function setFoto($foto){
		$this->foto = $foto;
	}


	public function getDescricao(){
		return $this->descricao;
	}


	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	
	public function getUsuarioId(){
		return $this->usuario_id;
	}


	public function setUsuarioId($usuario_id){
		$this->usuario_id = $usuario_id;
	}

	public function getIdade(){
		return $this->idade;
	}


	public function setIdade($idade){
		$this->idade = $idade;
	}

	public function getTipo(){
		return $this->tipo;
	}


	public function setTipo($tipo){
		$this->tipo = $tipo;
	}


}

/*id        | int(11)      | NO   | PRI | NULL    |       |
| nome      | varchar(255) | NO   |     | NULL    |       |
| idade     | int(11)      | YES  |     | NULL    |       |
| raca      | varchar(255) | NO   |     | NULL    |       |
| porte     | varchar(255) | NO   |     | NULL    |       |
| foto      | varchar(255) | NO   |     | NULL    |       |
| descricao */