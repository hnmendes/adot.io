<?php

$senha = strip_tags($_POST['editasenha']);

$usuario = new Usuario();

$usuario->editarSenha($senha);