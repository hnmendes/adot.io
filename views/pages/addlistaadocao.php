<?php


$nome = strip_tags($_POST['nome']);
$raca = strip_tags($_POST['raca']);
$idade = strip_tags($_POST['idade']);
$tipo = strip_tags($_POST['tipo']);
$porte = strip_tags($_POST['porte']);
$descricao = strip_tags($_POST['descricao']);
$id = $_SESSION['id'];
$foto = $_FILES['foto-animal']['name'];

// var_dump($foto);

// echo '<script>alert("'.$foto.'");</script>';


$animaladocao = new AnimalAdocao($nome,$raca,$idade,$tipo,$porte,$descricao);

$animaladocao->registraAnimal($id,$foto);

// $teste = $animaladocao->getIdAnimal("Testando 1",18);





