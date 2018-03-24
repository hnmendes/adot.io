
<div class="container">
    <h1>Novidades</h1>
</div>

<?php 
    if(isset($_SESSION['logado']) && $_SESSION['acesso'] == 1){
        
        
        echo '<form method="POST" action="/addnovidade" class="col s12" >';
        echo '<div class="container"><div clas="col s12 m7"><div class="card"><div class="card-content">';
        
        echo '<div class="row">
        <div class="input-field col s12"><input id="titulo" name="titulo" type="text" class="validate"><label for="password">Título</label></div></div>';
        echo '<div class="row"><div class="input-field col s12"><textarea name="descricao" id="descricao" class="materialize-textarea"></textarea><label for="textarea1">Digite sua novidade</label></div></div>';
        echo '<input class="btn" type="submit" value="Enviar">';
        echo '</div></div></div></div></form>';
    }


    $novidade = new Novidade();

    $novidade = $novidade->consultaNovidades();

    // print_r($novidade);

    // $cont = count($array);
    if(is_array($novidade) && count($novidade) != 0){

    for($i = 0; $i < count($novidade); $i++){
    
        echo '  <div class="container"><div class="col s12 m7">
            
            <br>
                <div class="section ">
            <h2 class="header titulo">'.$novidade[$i]['titulo'].'</h2>
            <p class="autor">Autor: '.$novidade[$i]['autor'].'</p></div>
                <div class="divider"></div>
                <div class="card horizontal section">
                <div class="card-stacked">
            <div class="card-content">
                    <p>'.$novidade[$i]['descricao'].'
                    </p>
                </div>';

        if(isset($_SESSION['logado']) && $_SESSION['nome'] == $novidade[$i]['autor']){    
            
            echo    '<div class="card-action">
                <form method="POST" action="/deletarnovidade">

                    <input type="hidden" name="id_novidade" value="'.$novidade[$i]['id'].'">
                    <button type="submit" class="btn">Deletar Publicação</button>
                </form>

                </div>';

            }
        echo'        
            </div></div>
                </div>
            </div>';

        // $arrayNovidades = array($array[$i]['id']);


    }
}else{

    echo '<div class="container"><div class="card"><div class="card-content">';
    echo '<h3>Não há novidades aqui, ainda.</h3><br>';
    echo '<h5>Aguarde por mais novidades por parte dos administradores</h5>';
    echo '<img class="responsive-img" src="views/_images/vira-lata.jpg">';
    echo '</div></div></div>';
}

?>


