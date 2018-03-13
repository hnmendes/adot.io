<main>
	
	<div class="row filtro" style="max-width:800px;">
		<div class="col s6">
		
			<div class="card" style="max-width:-300px;"> 
				<div class="card-content">
				<div class="input-field col s6">
					<i class=""></i>
					<input id="icon_prefix" type="text" class="validate">
					<label for="icon_prefix">Buscar</label>
				</div>
				
				<div class="input-field col s6">
				<p id="lista">Idade:</p>
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
	</div>
	</div> 

			<?php
				
				$animais = new AnimalAdocao();

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

					echo '<div class="adocao-animais"><div class="row">';
					echo '<div style="max-width:700px;" class="card"><div class="card-content" style="">';

            echo '    <a class="waves-effect waves-light modal-trigger">';

            // var_dump($animal['foto']);
                if($animal['foto'] == null || $animal['foto'] == ""){
                    // var_dump($i);

                    echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
                }else{
                    echo '<img src="views/_images/user/animal/adocao/'.$animal['foto'].'" width="200" class="responsive-img" id="doog">';
                }

            echo    '</a>

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
                <br>  <br>  <a href="#modal'.$i.'" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">pets</i>Informações</a>

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
                                echo '<img class="material-boxed" src="views/_images/user/animal/adocao/'.$animal['foto'].'" width="300" class="responsive-img" id="doog">';
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
					echo '<p style="color:blue;">Animal disponível para adoção.</p>
						<button class="btn">Adotar</button>
                            <div class="divider"></div>';
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