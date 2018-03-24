<?php
	
	if(!isset($_SESSION['logado'])){
		echo '<script>alert("Você precisa estar logado.")</script>';
		echo '<script>location.href= "/home"</script>';
	}
/*

            | id         | int(11)      | NO   | PRI | NULL    |       |
			| nome       | varchar(255) | NO   |     | NULL    |       |
			| idade      | int(11)      | YES  |     | NULL    |       |
			| raca       | varchar(255) | NO   |     | NULL    |       |
			| porte      | varchar(255) | NO   |     | NULL    |       |
			| foto       | varchar(255) | NO   |     | NULL    |       |
			| descricao  | text         | YES  |     | NULL    |       |
			| usuario_id | int(11)      | NO   | MUL | NULL    |       |
			+------------+--------------+------+-----+---------+-------+
			
			*/

			// echo $_SERVER['HTTP_REFERER'];

?>
<div class="container">

<div class="card">

<div class="card-content">

	<form action="/addlistaadocao" method="post" enctype="multipart/form-data">
		
		<p style="color:red;" id="erro-nome"></p>

		<input type="text" placeholder="Nome" name="nome" id="nome">

		<br>

		<p style="color:red;" id="erro-idade"></p> <br>
		
		<p class="range-field">Selecione a idade:<input type="range" name="idade" id="idade" min="0" max="17"></p>
		
		<p style="color:red;" id="erro-raca"></p>

		<input type="text" placeholder="Raça" name="raca" id="raca">

		<br>

		<input type="text" placeholder="Tipo do animal" name="tipo" id="tipo">

		<br><br>

		<p style="color:red;" id="erro-foto"></p><br>

		Adicionar uma foto do animalzinho

		<input type="file" name="foto-animal" id="foto-animal"><br>

		<br>

		<p style="color:red;" id="erro-porte"></p>

		<select name="porte" id="porte" required>
			<option selected="selected" disabled value="">Selecione o porte</option>
			<option value="Pequeno">Pequeno</option>
			<option value="Médio">Médio</option>
			<option value="Grande">Grande</option>
		</select>
		
		<br>
		
		<p style="color:red;" id="erro-desc"></p>

		Descrição
		<textarea id="descricao" name="descricao"></textarea>

		<br>

		<br>

		<button class="btn" type="submit" onclick="validacoes();">Adicionar</button>
		<a href="/logado" class="btn">Cancelar</a>

	</form>

</div>
</div>
</div>

<script>

var validaNome = function(){

	var nome = document.getElementById("nome");
	var erro = document.getElementById("erro-nome");

	if(nome.value == "" || nome.value == null){
		
		erro.innerHTML = "Por favor, digite um nome";

		nome.focus();

		return false;
	
	}else{
		
		return true;
	}}

var validaRaca = function(){

	var raca = document.getElementById("raca");

	var erro = document.getElementById("erro-raca");


	if(raca.value == "" || raca.value == null){

		erro.innerHTML = "Por favor, diga qual a raça do animalzinho, se for sem raça definida, digite SRD";
		raca.focus();

		return false;

	}else{
		return true;
	}}

var validaFoto = function(){
	
	var foto = document.getElementById("foto-animal");
	var erro = document.getElementById("erro-foto");

	if(foto.files.length == 0){
		
		erro.innerHTML = "Você deve adicionar uma foto para o animalzinho aparecer na lista.";
		foto.focus();

		return false;

	}else{
		
		return true;
	}}

var validaPorte = function (){

	var porte = document.getElementById("porte");
	var erro = document.getElementById("erro-porte");

	if(porte.options.value == ""){
		erro.innerHTML = "Por favor selecione um porte.";
		porte.focus();

		return false;
	}else{
		return true;
	}}

var validaDescricao = function(){
	var descricao = document.getElementById("descricao");

	var erro = document.getElementById("erro-desc");

	if(descricao.value == "" || descricao.value == null){
		erro.innerHTML = "Escreva algo na descrição, fale um pouco sobre seu animalzinho.";
		descricao.focus();

		return false;
	}else{
		return true;
	}
}

var validacoes = function(){
	validaNome();
	validaRaca();
	validaFoto();
	validaPorte();
	validaDescricao();
}


</script>