<?php

$descricao = strip_tags($_POST['editadesc']);


$usuario = new Usuario();


$usuario->editarDescricao($descricao);