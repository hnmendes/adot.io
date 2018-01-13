<?php

define ('HOST', 'localhost');
define ('USUARIOBD','root');
define ('SENHABD','1234');
define('NOMEDB','adotio');

$conexao = new mysqli(HOST,USUARIOBD,SENHABD,NOMEDB);

if($conexao->connect_error){
    echo "Erro ao conectar-se, detalhes: ".$conexao->connect_error. " Recomendo que busque na internet do que se trata o erro.";
}else{
    echo "jooj";
}