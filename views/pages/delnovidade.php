<?php

	$id = $_POST['id_novidade'];

	$novidade = new Novidade();

	if($novidade->deletarNovidade($id)){

		echo '<script>alert("Postagem excluída com sucesso!");</script>';
		echo '<script>location.href="/novidades";</script>';
	}else{
		echo '<script>alert("Não foi possível excluir essa publicação");</script>';
	}