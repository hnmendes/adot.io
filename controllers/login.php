<?php
	

	$email = $_POST['lemail']; 
	$senha = $_POST['lsenha'];

	$usuario = new Usuario();


	if($email == ""){
		echo '<script>alert("Preencha o email corretamente.");</script>';
		echo '<script>location.href="/home"</script>';

	}else if($senha == ""){
		echo '<script>alert("Preencha a senha corretamente.");</script>';
		echo '<script>location.href="/home"</script>';

	}else if($senha == "" && $email == ""){
		echo '<script>alert("Preencha todos os campos.");</script>';	
		echo '<script>location.href="/home"</script>';

	}else if($usuario->login($email,$senha) == true){

		$_SESSION['logado'] = 1;

		echo '<script>alert("Logado com sucesso.");</script>';

		// echo '<script>alert("'.var_dump($_SESSION['logado']).'");</script>';
		
		// var_dump($usuario->getMunicipio());

		// echo '<script>alert("O id do usuario é "+'.$usuario->getIdusuario().');</script>';



		echo '<script>location.href="/home"</script>';


	}else{
		echo '<script>alert("Dados incorretos.");</script>';
		echo '<script>location.href="/home"</script>';
	}
