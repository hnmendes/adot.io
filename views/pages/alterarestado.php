<?php

$estado = strip_tags($_POST['editaest']);

$usuario = new Usuario();

$usuario->editarEstado($estado);