<?php

$imagem = $_FILES['foto']['name'];


$usuario = new Usuario();


$usuario->editarImagem($imagem);