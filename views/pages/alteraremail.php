<?php

$email = strip_tags($_POST['editaemail']);


$usuario = new Usuario();


$usuario->editarEmail($email);