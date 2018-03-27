<main>
	
	<!-- FILTRO -->
	<div class="row right-align hide-on-small-only show-on-medium-and-up">
		<div class="col s12 m4">
			<div class="card col s12 m2" style="position: fixed;">
				<div class="card-content">
					<span class="card-title">Pesquisa</span>
					<form method="get" action="/pesquisaadocao">
						<p>Idade:</p>
						<select name="idade" required>
							<option value="" disabled selected>Selecione a idade</option>
							<option value="1">1 ano</option>
							<option value="2">2 anos</option>
							<option value="3">3 anos</option>
							<option value="4">4 anos</option>
							<option value="5">5 anos</option>
							<option value="6">6 anos</option>
							<option value="7">7 anos</option>
							<option value="8">8 anos</option>
							<option value="9">9 anos</option>
							<option value="10">10 anos</option>
							<option value="11">11 anos</option>
							<option value="12">12 anos</option>
							<option value="13">13 anos</option>
							<option value="14">14 anos</option>
							<option value="15">15 anos</option>
							<option value="16">16 anos</option>
							<option value="17">17 anos</option>
						</select>

						<p>Porte:</p>
						<select name="porte" required>
							<option value="" disabled selected>Escolha o porte</option>
							<option value="Pequeno">Pequeno</option>
							<option value="Médio">Médio</option>
							<option value="Grande">Grande</option>
						</select>
					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light" type="submit" name="action">Pesquisar
							<i class="material-icons right">search</i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="row right-align show-on-small hide-on-med-and-up">
		<div class="col s12 m4">
			<div class="card col s12 m2">
				<div class="card-content">
					<span class="card-title">Pesquisa</span>
					<form method="get" action="/pesquisaadocao">
						<p>Idade:</p>
						<select name="idade" required>
							<option value="" disabled selected>Selecione a idade</option>
							<option value="1">1 ano</option>
							<option value="2">2 anos</option>
							<option value="3">3 anos</option>
							<option value="4">4 anos</option>
							<option value="5">5 anos</option>
							<option value="6">6 anos</option>
							<option value="7">7 anos</option>
							<option value="8">8 anos</option>
							<option value="9">9 anos</option>
							<option value="10">10 anos</option>
							<option value="11">11 anos</option>
							<option value="12">12 anos</option>
							<option value="13">13 anos</option>
							<option value="14">14 anos</option>
							<option value="15">15 anos</option>
							<option value="16">16 anos</option>
							<option value="17">17 anos</option>
						</select>

						<p>Porte:</p>
						<select name="porte" required>
							<option value="" disabled selected>Escolha o porte</option>
							<option value="Pequeno">Pequeno</option>
							<option value="Médio">Médio</option>
							<option value="Grande">Grande</option>
						</select>
					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light" type="submit" name="action">Pesquisar
							<i class="material-icons right">search</i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- /FILTRO  --> 
	<?php

	$animais = new AnimalPerdido();

	$animais = $animais->getAll();

				// var_dump($animais);

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
			$i = 0;
			foreach($animais as $animal){

				$user = new Usuario();
				$user = $user->getLocalById($animal['usuario_id']);
					// print_r($user);

				$i ++;

				echo '<div class="row show-on-small hide-on-med-and-up">
				<div class="col s12 left-align">';

				echo '<div  class="card" style="max-width:300px">
				<div class="card-image" style="max-width:200px;">';

				echo '    <a class="waves-effect waves-light modal-trigger">';

            // var_dump($animal['foto']);
				if($animal['foto'] == null || $animal['foto'] == ""){
                    // var_dump($i);

					echo '<img src="views/_images/cachorro.jpg" width="150px" class="responsive-img" id="doog">';
				}else{
					echo '<img src="views/_images/user/animal/perdido/'.$animal['foto'].'" width="100" height="100" class="responsive-img" id="doog">
					</div>';
					/* FECHAMENTO DO CARD-IMAGE*/
				}
				/* aberturas do stacked e content*/
				echo    '</a>

				<div class="card-stacked">
				<div class="card-content">

				<br>    <h5><b>Nome:</b> '.$animal['nome'].'
				<br>    <h5><b>Raça:</b> '.$animal['raca'].'
				<br>    <h5><b>Tipo:</b> '.$animal['tipo'].'
				<br>    <h5><b>Idade:</b> '; 

				if($animal['idade'] == null || $animal['idade'] == 0){
					echo 'Sem idade definida';
				}else{
					echo $animal['idade'];
				}
				echo '  
				<br>  <br> </div> 
				<div class="card-action">
				<a href="#modal'.$i.'" class="waves-effect waves-light btn modal-trigger">
				<i class="material-icons left">pets</i>Informações</a>
				</div>
				</div>
				<!-- Modal Structure -->
				<div id="modal'.$i.'" class="modal" style="max-height: 400px;">
				<div class="modal-content">
				<h4 id="modal'.$i.'">'.$animal['nome'].'</h4>


				<div class="card">
				<div class="card-content">';

				if($animal['foto'] == null || $animal['foto'] == ""){
                    // var_dump($i);

					echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
				}else{
					echo '<img class="material-boxed" src="views/_images/user/animal/perdido/'.$animal['foto'].'" width="300" class="responsive-img" id="doog">';
				}
								// <img class="material-boxed" src="views/_images/cachorro.jpg" width="300">

				$user = new Usuario();
				$user = $user->getLocalById($animal['usuario_id']);

				echo        '<div class="card">
				<div class="card-content">
				<p><b>Descricao:</b> '.$animal['descricao'].'</p>
				<p><b>Estado:</b> '.$user[0]['estado'].'</p>
				<p><b>Cidade:</b> '.$user[0]['municipio'].'</p>
				</div></div>
				</div>
				</div>


				<div class="modal-footer">';


				if($animal['situacao'] == 0){
					echo '<p style="color:yellow;"><i class="material-icons">warning</i>Animal perdido.</p><br>';
					echo '<form method="post" action="/encontrar">';
					echo '<input type="hidden" name="animalid" value="'.$animal['id'].'">';
					echo '<input type="hidden" name="usuarioid" value="'.$animal['usuario_id'].'">';
					echo '<button class="btn">Encontrei</button>';
					echo '</form>';
					echo '<div class="divider"></div>';
				}else if($animal['situacao'] == 3){
					echo '<p style="color:red;">Animal se encontra na situação de removido da lista.</p>';

				}else if($animal['situacao'] == 1){
					echo '<p style="color:green;">Animal se encontra na situação de adotado.</p>';
				}

                if((isset($_SESSION['logado']))&&($_SESSION['id'] == $animal['usuario_id']) && ($animal['situacao'] != 3)){ //todo
                	echo '<form method = "post" action = "/deletaradocao">
                	<input type="hidden" name="situacao" value="'.$animal['id'].'" >
                	<button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Remover da lista</button></form><div class="divider"></div>';
                }
                


                echo '<a href="#!" class="modal-action modal-close waves-effect waves-green btn">voltar</a>
                </div>
                </div></div></div></div></div></div></div>';

					// var_dump($animal['id']);
            }


            ?>


            <!-- php pra quando for pra tela grande -->

            <?php

            $animais = new AnimalPerdido();

            $animais = $animais->getAll();

				// var_dump($animais);

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
			$i = 0;
			foreach($animais as $animal){

				$user = new Usuario();
				$user = $user->getLocalById($animal['usuario_id']);
					// print_r($user);

				$i ++;

				echo '<div class="adocao-animais show-on-medium-and-up hide-on-small-only">
						<div class="row">';

				echo '		<div  class="card horizontal">
								<div class="card-image" style="max-width:200px;">';

				echo '    <a class="waves-effect waves-light modal-trigger">';

            // var_dump($animal['foto']);
				if($animal['foto'] == null || $animal['foto'] == ""){
                    // var_dump($i);

					echo '<img src="views/_images/cachorro.jpg" width="150px" class="responsive-img" id="doog">';
				}else{
					echo '<img src="views/_images/user/animal/perdido/'.$animal['foto'].'" width="150" heigth="150px" class="responsive-img" id="doog">
					</div>';
					/* FECHAMENTO DO CARD-IMAGE*/
				}
				/* aberturas do stacked e content*/
				echo    '</a>

				<div class="card-stacked">
					<div class="card-content">

				<br>    <h5><b>Nome:</b> '.$animal['nome'].'
				<br>    <h5><b>Raça:</b> '.$animal['raca'].'
				<br>    <h5><b>Tipo:</b> '.$animal['tipo'].'
				<br>    <h5><b>Idade:</b> '; 
				/*FECHAMENTO*/

				if($animal['idade'] == null || $animal['idade'] == 0){
					echo 'Sem idade definida';
				}else{
					echo $animal['idade'];
				}
				echo '  
				<br>  <br> </div> 
					<div class="card-action">
				<a href="#modalj'.$i.'" class="waves-effect waves-light btn modal-trigger">
				<i class="material-icons left">pets</i>Informações</a>
					</div>
				</div>
				<!-- Modal Structure -->
				<div id="modalj'.$i.'" class="modal" style="max-height: 400px;">
				<div class="modal-content">
				<h4 id="modaljv'.$i.'">'.$animal['nome'].'</h4>


				<div class="card">
				<div class="card-content">';

				if($animal['foto'] == null || $animal['foto'] == ""){
                    // var_dump($i);

					echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
				}else{
					echo '<img class="material-boxed" src="views/_images/user/animal/perdido/'.$animal['foto'].'" width="300" class="responsive-img" id="doog">';
				}
								// <img class="material-boxed" src="views/_images/cachorro.jpg" width="300">

				$user = new Usuario();
				$user = $user->getLocalById($animal['usuario_id']);

				echo        '<div class="card">
				<div class="card-content">
				<p><b>Descricao:</b> '.$animal['descricao'].'</p>
				<p><b>Estado:</b> '.$user[0]['estado'].'</p>
				<p><b>Cidade:</b> '.$user[0]['municipio'].'</p>
							
							</div>
						</div>
					</div>
				</div>


				<div class="modal-footer">';


				if($animal['situacao'] == 0){
					echo '<p style="color:yellow;"><i class="material-icons">warning</i>Animal perdido.</p><br>';
					echo '<form method="post" action="/encontrar">';
					echo '<input type="hidden" name="animalid" value="'.$animal['id'].'">';
					echo '<input type="hidden" name="usuarioid" value="'.$animal['usuario_id'].'">';
					echo '<button class="btn">Encontrei</button>';
					echo '</form>';
					echo '<div class="divider"></div>';
				}else if($animal['situacao'] == 3){
					echo '<p style="color:red;">Animal se encontra na situação de removido da lista.</p>';

				}else if($animal['situacao'] == 1){
					echo '<p style="color:green;">Animal se encontra na situação de adotado.</p>';
				}

				if((isset($_SESSION['logado']))&&($_SESSION['id'] == $animal['usuario_id']) && ($animal['situacao'] != 3)){ //todo
					echo '<form method = "post" action = "/deletaradocao">
					<input type="hidden" name="situacao" value="'.$animal['id'].'" >
					<button type="submit" class="waves-effect waves-light btn">
					<i class="material-icons left">pets</i>Remover da lista</button></form>


					<div class="divider"></div>';
				}



				echo '<a href="#!" class="modal-action modal-close waves-effect waves-green btn">voltar</a>
											</div>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                </div>';

					// var_dump($animal['id']);
			}


			?>




			</main>




			<script>

			$(document).ready(function() {
				$('select').material_select();
			});

//<![CDATA[

			window.onload=function(){
				$(document).ready(function() {
					$('select').material_select();
				});
			}

			$(".button-collapse").sideNav();


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

		$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});

		</script>
