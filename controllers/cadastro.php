<?php

if (isset($_POST) || is_array($_POST) || $_POST['nome'] != "" || $_POST['email'] != "" || $_POST['estado'] != "" || $_POST['municipio'] != "" || $_POST['senha'] != "") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $senha = $_POST['senha'];

    $nome = strip_tags($nome);
    $email = strip_tags($email);
    $estado = strip_tags($estado);
    $municipio = strip_tags($municipio);
    $senha = strip_tags($senha);

    $usuarioForm = new Usuario($nome, $email, $estado, $municipio, $senha);

    $usuarioForm->registraUsuario();

    echo '<script>Usuario cadastrado com sucesso.</script>';
} else {
    echo '<script>alert("Preencha os dados corretamente.");</script>';
}
