<?php


$cidade = strip_tags($_POST['editacid']);

$usuario = new Usuario();

$usuario->editarCidade($cidade);