<?php

// echo '<script>alert("teste");</script>';

$titulo = strip_tags($_POST['titulo']);

$conteudo  = strip_tags($_POST['descricao']);

$id_usuario = $_SESSION['id'];

$nome_usuario = $_SESSION['nome'];

$novidade = new Novidade($titulo,$nome_usuario,$conteudo,$id_usuario);

$novidade->addNovidade();

