<?php 

$id = $_POST['id'];

$usuario = new Usuario();

$usuario->desativarUsuario($id);

