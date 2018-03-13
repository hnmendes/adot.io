
<div class="container">

	<h1>Que bom que encontrou um animal!</h1>

</div>


<div class="container">
	<div class="card">
		<div class="card-content">
			<h4>Agora, para ajudar o dono, por favor adicione uma foto do lugar e o endereço.</h4>

			<br><br>

			

			<form class="col s12" method="POST" action="/encontrou">

			<div class="row">
			
			<div class="input-field col s12">
				
				<p>Foto do local</p>
				<input type="file" name="foto" id="foto" required>
				
			</div>
			
			</div>

			<div class="divider"></div>
			
			<div class="row">
			
			<div class="input-field col s12">
				<input type="text" name="endereco" id="endereco" required>
				<label for="endereco">Endereço:</label>
			</div>
			
			</div>


			<div class="row">
				<div class="input-field col s12">
					<input type="submit" id="submit" class="btn" name="submit" value="Enviar">
				</div>
			</div>

			

			<div class="row">
				<div class="input-field col s12">
					<a href="/perdido" type="button" name="cancelar" class="btn" style="margin-left: 150px; margin-top: -125px;">Cancelar</a>
				</div>
			</div>




			</form>

			
		</div>
	</div>
</div>