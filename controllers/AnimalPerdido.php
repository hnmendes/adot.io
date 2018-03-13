<?php


class AnimalPerdido extends Animal{


	public function __construct($nome = null, $raca = null, $porte = null, $descricao = null, $foto = null){
		$this->setNome($nome);
		$this->setRaca($raca);
		$this->setDescricao($descricao);
		$this->setFoto($foto);
	}

	
}

/*	private $id;
	private $nome;
	private $raca;
	private $porte;
	private $foto;
	private $descricao;
	private $usuario_id;
*/