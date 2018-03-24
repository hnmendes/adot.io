<?php

$id = $_POST['situacao'];

$del = new AnimalPerdido();


if($del->setSituacaoRemovido($id)){
	echo '<script>alert("Removido com sucesso. Agora seu animalsinho não vai ser visto na lista.");</script>';
	echo '<script>location.href = "/logado";</script>';
}else{
	echo '<script>alert("Ocorreu um erro no processo. Contate os administradores.");</script>';
	echo '<script>location.href = "/logado";</script>';
}