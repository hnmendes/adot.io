<?php

if(isset($_SESSION['logado'])){
	
	
}else{
	echo '<script>alert("Você precisa estar logado para poder entrar em contato com a pessoa.");</script>';
	header("Location: /adocao");
}