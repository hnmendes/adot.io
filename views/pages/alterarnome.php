<?php

$nome = strip_tags($_POST['editanome']);

$usuario = new Usuario();

$usuario->editarnome($nome);