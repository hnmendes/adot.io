<main>
	<div class="row">
		<div class="col s3">
			<div class="">
				<p id="lista">Raça:</p>
				<div class="input-field col s12">
					<i class=""></i>
					<input id="icon_prefix" type="text" class="validate">
					<label for="icon_prefix">Buscar...</label>
				</div>
				<p id="lista">Idade:</p>
				<div class="input-field col s12">
					<p class="range-field">
						<input type="range" name="idade" min="0" max="17">
					</p>
				</div>
				<p id="lista">Porte:</p>
				<select >
					<option value="" disabled selected>Escolha o porte:</option>
					<option value="1">Pequeno</option>
					<option value="2">Medio</option>
					<option value="3">Grande</option>
				</select>
				<button class="btn waves-effect waves-light" type="submit" name="action">Pesquisar
					<i class="material-icons right">search</i>
				</button>
			</div>
		</div>


		<div  class=" col s9" class="card-content">
			<?php for($i=1; $i<7; $i++):?>
			<div id="cx" class="card-panel hoverable">

				<a class="waves-effect waves-light modal-trigger" href="#modal1">
					<img src="views/_images/cachorrov.jpg" width="200" class="responsive-img" id="doog">
				</a>

				<br>    Nome: Dogao
				<br>    Raça: Irineu
				<br>    idade: 3 anos
				<br>  <br>  <a href="#" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Adotar</a>

				<!-- Modal Structure -->
				<div id="modal1" class="modal">
					<div class="modal-content">
						<h4 id="modal1">Dogao</h4>
						<img src="images/dog.jpg" width="300">
						<p class="right-align">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
						</div>
						<div class="modal-footer">
							<a href="#" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Adotar</a>
							<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">voltar</a>
						</div>
					</div>

				</div>
			<?php endfor;?>
		</div>


	</div>

	<ul class="pagination " align="center">

		<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
		<li class="active teal lighten-2"><a href="pagina1.html">1</a></li>
		<li class="waves-effect"><a href="pagina2.html">2</a></li>
		<li class="waves-effect"><a href="pagina3.html">3</a></li>
		<li class="waves-effect"><a href="pagina4.html">4</a></li>
		<li class="waves-effect"><a href="pagina5.html">5</a></li>
		<li class="waves-effect"><a href="pagina2.html"><i class="material-icons">chevron_right</i></a></li>

	</ul>



</main>


<script>
$(document).ready(function() {
	$('select').material_select();
});
</script>
<script>//<![CDATA[
window.onload=function(){
	$(document).ready(function() {
		$('select').material_select();
	});
}//]]> 
</script>

<script>
$(".button-collapse").sideNav();
</script>

<script>
$('.modal').modal({
	      	dismissible: true, // Modal can be dismissed by clicking outside of the modal
    	 	opacity: .5, // Opacity of modal background
      		inDuration: 300, // Transition in duration
      		outDuration: 200, // Transition out duration
      		startingTop: '4%', // Starting top style attribute
      		endingTop: '10%', // Ending top style attribute
      		ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
      			alert("Ready");
      			console.log(modal, trigger);
      		},
      		complete: function() { alert('Closed'); } // Callback for Modal close
      	}
      	);
</script>

<script>
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});
</script>
