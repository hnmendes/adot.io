
<div class="container">

	<h5>Que bom que encontrou um animal!</h5>

</div>

<?php 
	$usuarioid = $_POST['usuarioid'];
	$animalid = $_POST['animalid'];

?>


<div class="container">
	<div class="card">
		<div class="card-content">


			<form class="col s12" method="POST" action="/emailperdido" id="form" enctype="multipart/form-data">

			<div class="row">
			
			<input type="hidden" name="usuarioid" value="<?php echo $usuarioid ?>">
			
			<input type="hidden" name="animalid" value="<?php echo $animalid ?>">

			<p style="color:red;" id="erro-foto"></p>

			<div class="input-field col s12">
				

				<p><h4>Foto do animal no local</h4></p>
				<input type="file" name="foto" id="foto" required><br>
				
			</div>
			
			</div>

			<div class="divider"></div>
			
			<div class="row">
			
			<p style="color:red;" id="erro-email"></p>

			<div class="input-field col s12">
				
				
				<input type="email" name="email" id="email" required>
				<label for="email">Email:</label>
			</div>

			<p style="color:red;" id="erro-rua"></p>

			<div class="input-field col s12">
					

				<input type="text" name="endereco" id="rua" required>
				<label for="endereco">Rua:</label>
			</div>

			<p style="color:red;" id="erro-bairro"></p>

			<div class="input-field col s12">
				
			
				<input type="text" name="bairro" id="bairro" required>
				<label for="bairro">Bairro:</label>
			</div>


			<div class="input-field col s12">
				<p style="color:red;" id="erro-comp"></p>	

				<input type="text" name="complemento" id="complemento" required>
				<label for="complemento">Complemento:</label>
			</div><br>

			<div class="input-field col s12">	

				<input type="text" maxlength="15" onkeypress="mascara(this,'## # ####-####')" name="telefone" id="telefone" required>
				<label for="telefone">Número de contato:</label>
			</div><br>

			<div class="input-field col s12"><p style="color:red;"></p><textarea name="descricao" id="descricao" class="materialize-textarea"></textarea><label for="textarea1">Digite alguma mensagem para o dono</label></div>
        	


			
				<div class="input-field col s12">
					<input type="submit" id="submit" class="btn" name="submit" value="Enviar" onclick=" return validacoes();" >
				</div>
			

			
				<div class="input-field col s12">
					<a href="/perdido" type="button" name="cancelar" class="btn" style="margin-left: 120px; margin-top: -92px;">Cancelar</a>
				</div>
			




			</form>

			
		</div>
	</div>
</div>
</div>

<script>

var validaEmail = function(){

	var email = document.getElementById("email");
	var erro = document.getElementById("erro-email");

	if(email.value == "" || email.value == null){
		
		erro.innerHTML = "Por favor, digite um email para entrarmos em contato quando alguém encontrar.";

		email.focus();

		return false;
	
	}else{
		
		return true;
	}}

var validaRua = function(){

	var rua = document.getElementById("rua");

	var erro = document.getElementById("erro-rua");


	if(rua.value == "" || rua.value == null){

		erro.innerHTML = "Por favor, diga qual a rua em que se encontra o animal.";
		rua.focus();

		return false;

	}else{
		return true;
	}}

var validaFoto = function(){
	
	var foto = document.getElementById("foto");
	var erro = document.getElementById("erro-foto");

	if(foto.files.length == 0){
		
		erro.innerHTML = "Você deve adicionar uma foto, por segurança.";
		foto.focus();

		return false;

	}else{
		
		return true;
	}}

var validaBairro = function (){

	var bairro = document.getElementById("bairro");
	var erro = document.getElementById("erro-bairro");

	if(bairro.value == "" || bairro.value == null){
		erro.innerHTML = "Por favor, digite o bairro que se encontra o animal.";
		bairro.focus();

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

// var validaCidade = function(){
	
// 	var cidade = document.getElementById("cidade");

// 	var erro = document.getElementById("erro-cid");

// 	alert("teste");

// 	if(cidade.value == null){
		
// 		erro.innerHTML = "Digite a cidade, por favor.";
// 		cidade.focus();

// 		return false;
// 	}else{
// 		return true;
// 	}
// }


var validaComplemento = function(){
	var complemento = document.getElementById("complemento");

	var erro = document.getElementById("erro-comp");

	if(cidade.value == "" || cidade.value == null){
		erro.innerHTML = "Digite o complemento, por favor.";
		complemento.focus();

		return false;
	}else{
		return true;
	}
}

var validacoes = function(){
	
	validaEmail();
	validaRua();
	validaFoto();
	validaBairro();
	validaDescricao();
	validaComplemento();
}

var validaSubmit = function(){
	var form = document.getElementById("form");

	return false;	

	if(validacoes()){
		document.form.submit();
	}else{
		return false;
	}
}


function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 
 if (texto.substring(0,1) != saida){
 		t.value += texto.substring(0,1);
 }
 }

</script>
