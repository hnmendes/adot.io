<?php


$id = $_POST['situacao'];

$animalAdocao = new animalAdocao();

if($animalAdocao->resetSituacaoNaLista($id)){
	echo '<script>alert("A situação do animal foi alterada para adotado e ele voltou para lista de adocao.");</script>';
	echo '<script>location.href = "/logado";</script>';
}else{
	echo '<script>alert("Ocorreu um erro no processo. Contate os administradores.");</script>';
	echo '<script>location.href = "/logado";</script>';
}