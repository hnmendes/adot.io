<?php

if (!isset($_SESSION['logado'])) {
    echo "<script>alert('Você não tem permissão, logue-se para entrar aqui.');</script>";
    echo '<script>location.href="/home"</script>';
}

?>


<nav class="nav-extended logado">
    <div class="nav-content logado">
        <ul class="tabs tabs-transparent">
            <li class="tab"><a href="#conta">Minha conta</a></li>
            <li class="tab"><a href="#adocao">Meus animais para adoção</a></li>
            <li class="tab"><a href="#perdido">Meus animais perdidos</a></li>
            <?php if ($_SESSION['acesso'] == 1) {
                echo '<li class="tab"><a href="#usuarios">Usuarios</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>

<!-- Área de minha conta -->

<div id="conta" class="col s12">
    <div class="container">
        <div class="col s12 m7">
            <h2 class="header">Seja bem vindo, <?php echo $_SESSION['nome'] ?></h2>
            <div class="card horizontal">
                <div class="card-image">
                    <img src="<?php
                    if (isset($_SESSION['foto'])) {
                        echo 'views/_images/user/' . $_SESSION['foto'];
                    } else {
                        echo 'views/_images/cachorroegato.jpg';
                    }

                    ?>" width="100" height="100">



                </div>



                <div class="card-stacked">
                    <div class="card-content">

                        <p>Imagem: <a href="#" id="editFoto" style="">Alterar imagem</a>

                            <div id="ceditfoto"></div>

                            <p>Nome: <span><?php echo $_SESSION['nome']; ?></span> <label><a href="#" id="editNome">Editar</a></label></p>

                            <div id="ceditn"></div>

                            <p>Senha: <label> ******* </label><label><a href="#" id="editSenha">Editar</a></label></p>

                            <div id="cedits"></div>

                            <p>Email: <label><?php echo $_SESSION['email'] . "      "; ?></label><label><a href="#" id="editEmail">Editar</a></label></p>

                            <div id="cedite"></div>

                            <p>Estado: <label><?php echo $_SESSION['estado'] . "    "; ?></label><label><a href="#" id="editEstado">Editar</a></label></p>

                            <div id="ceditest">

                                <p>Cidade: <label><?php echo $_SESSION['municipio'] . "   "; ?></label><label><a href="#" id="editCidade">Editar</a></label></p>

                                <div id="ceditc"></div>

                                <p>Sobre mim: <p><label> <?php
                                if (!isset($_SESSION['descricao']) || $_SESSION['descricao'] == '' || $_SESSION['descricao'] == null) {
                                    echo "Compartilhe o que gosta e/ou o que pensa. ";
                                } else {
                                    echo $_SESSION['descricao'];
                                }

                                ?><a href="#" id="editDesc">Editar</a>
                            </label></p> </p>

                            <div id="ceditdesc"></div>
                        </div></div>
                        <br>
                        <div class="card-action">
                            <form method="post" action="/desativaracc">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <button class="btn" type="submit" >Desativar conta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ABA DE ANIMAL ADOCAO -->





    <div id="adocao" class="col s12">
        <div class="container">
            <h2>Lista de animais para adoção de <?php echo $_SESSION['nome'] ?></h2>
        </div>


        <div class="row right-align hide-on-small-only show-on-medium-and-up">
            <div class="col s12 m4">
                <div class="card col s12 m2" style="position: fixed;">
                    <div class="card-content">

                        <p>Clique aqui pra adicionar um animal para adoção</p><br>
                        <a class="btn" href="/adicionaradocao" name="adicioanranimal">Adicionar animal</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row right-align show-on-small hide-on-med-and-up">
            <div class="col s12 m4">
                <div class="card col s12 m2">
                    <div class="card-content">

                        <p>Clique aqui pra adicionar um animal para adoção</p><br>
                        <a class="btn" href="/adicionaradocao" name="adicioanranimal">Adicionar animal</a>

                    </div>
                </div>
            </div>
        </div>


        <!-- /FILTRO-->

        <div class="container">
            <div  class=" col s9" class="card-content">
                <div id="cx" class="card-panel">

                    <?php

                    $animal = new AnimalAdocao();

                    $animal = $animal->getAllByUserId($_SESSION['id']);

                    $teste = new AnimalAdocao();

// var_dump($animal);

                    if (is_array($animal) || isset($animal)) {

                        $cont = count($animal);

    // var_dump($cont);

                        for ($i = 0; $i < $cont; $i++) {

                            echo '<div class="card">
                            <div class="card-content">';

                            echo '    <a class="waves-effect waves-light modal-trigger">';

        // var_dump($animal[$i]['foto']);
                            if ($animal[$i]['foto'] == null || $animal[$i]['foto'] == "") {
            // var_dump($i);

                                echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
                            } else {
                                echo '<img src="views/_images/user/animal/adocao/' . $animal[$i]['foto'] . '" width="200" class="responsive-img" id="doog">';
                            }

                            echo '</a>

                            <br>    Nome: ' . $animal[$i]['nome'] . '
                            <br>    Raça: ' . $animal[$i]['raca'] . '
                            <br>    Tipo: ' . $animal[$i]['tipo'] . '
                            <br>    Idade: ';

                            if ($animal[$i]['idade'] == null || $animal[$i]['idade'] == 0) {
                                echo 'Sem idade definida';
                            } else {
                                echo $animal[$i]['idade'];
                            }
                            echo '
                            <br>  <br>  <a href="#modal' . $i . '" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">pets</i>Informações</a>

                            <!-- Modal Structure -->
                            <div id="modal' . $i . '" class="modal" style="max-height: 400px;">
                            <div class="modal-content">
                            <h4 id="modal' . $i . '">' . $animal[$i]['nome'] . '</h4>


                            <div class="card">
                            <div class="card-content">';

                            if ($animal[$i]['foto'] == null || $animal[$i]['foto'] == "") {
            // var_dump($i);

                                echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
                            } else {
                                echo '<img class="material-boxed" src="views/_images/user/animal/adocao/' . $animal[$i]['foto'] . '" width="300" class="responsive-img" id="doog">';
                            }
        // <img class="material-boxed" src="views/_images/cachorro.jpg" width="300">
                            echo '<div class="card">
                            <div class="card-content">
                            <p><b>Descricao:</b> ' . $animal[$i]['descricao'] . '</p>
                            </div></div>
                            </div>
                            </div>


                            <div class="modal-footer">';

                            if ($animal[$i]['situacao'] == 0) {
                                echo '<form method = "post" action = "/adotado">

                                <input type="hidden" name="situacao" value="' . $animal[$i]['id'] . '" >
                                <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Foi adotado</button>
                                </form>

                                <div class="divider"></div>';
                            } else if ($animal[$i]['situacao'] == 3) {
                                echo '<p style="color:red;">Animal se encontra na situação de removido da lista.</p>';
                                echo '<form method = "post" action = "/readdadocao">

                                <input type="hidden" name="situacao" value="' . $animal[$i]['id'] . '" >
                                <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Colocar na lista novamente</button>
                                </form>';

                            } else if ($animal[$i]['situacao'] == 1) {
                                echo '<p style="color:green;">Animal se encontra na situação de adotado.</p>';
                            }

        if (($_SESSION['id'] == $animal[$i]['usuario_id']) && ($animal[$i]['situacao'] != 3)) { //todo
            echo '<form method = "post" action = "/deletaradocao">
            <input type="hidden" name="situacao" value="' . $animal[$i]['id'] . '" >
            <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Remover da lista</button></form><div class="divider"></div>';
        }

        echo '<a href="#!" class="modal-action modal-close waves-effect waves-green btn">voltar</a>
        </div>
        </div></div></div></div>';
    }

} else if ($animal == null || !is_array($animal) || !isset($animal)) {
    echo '<p>Você não tem nenhum animal para doar cadastrado.</p>';
}

// print_r($teste);

?>

</div>
</div>


</div>

</div>

</div>
</div>

<!-- PARTE DOS ANIMAIS PERDIDOS -->



<div id="perdido" class="col s12">
        <div class="container">
            <h2>Lista de animais perdidos <?php echo $_SESSION['nome'] ?></h2>
        </div>


        <div class="row right-align hide-on-small-only show-on-medium-and-up">
            <div class="col s12 m4">
                <div class="card col s12 m2" style="position: fixed;">
                    <div class="card-content">

                        <p>Clique aqui pra adicionar um animal perdido</p><br>
                        <a class="btn" href="/adicionaradocao" name="adicioanranimal">Adicionar animal</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row right-align show-on-small hide-on-med-and-up">
            <div class="col s12 m4">
                <div class="card col s12 m2">
                    <div class="card-content">

                        <p>Clique aqui pra adicionar um animal perdido</p><br>
                        <a class="btn" href="/adicionaradocao" name="adicioanranimal">Adicionar animal</a>

                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div  class=" col s9" class="card-content">
                <div id="cx" class="card-panel">

                    <?php

                    $animalperdido = new AnimalPerdido();

                    $animalperdido = $animalperdido->getAllByUserId($_SESSION['id']);

// $teste = new AnimalAdocao();

// var_dump($animal);

                    if (is_array($animalperdido) && isset($animalperdido) && count($animalperdido) != 0) {

                        $cont = count($animalperdido);

    // var_dump($cont);

                        for ($i = 0; $i < $cont; $i++) {

                            echo '<div class="card"><div class="card-content">';

                            echo '    <a class="waves-effect waves-light modal-trigger">';

        // var_dump($animal[$i]['foto']);
                            if ($animalperdido[$i]['foto'] == null || $animalperdido[$i]['foto'] == "") {
            // var_dump($i);

                                echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
                            } else {
                                echo '<img src="views/_images/user/animal/perdido/' . $animalperdido[$i]['foto'] . '" width="200" class="responsive-img" id="doog">';
                            }

                            echo '</a>

                            <br>    Nome: ' . $animalperdido[$i]['nome'] . '
                            <br>    Raça: ' . $animalperdido[$i]['raca'] . '
                            <br>    Tipo: ' . $animalperdido[$i]['tipo'] . '
                            <br>    Idade: ';

                            if ($animalperdido[$i]['idade'] == null || $animalperdido[$i]['idade'] == 0) {
                                echo 'Sem idade definida';
                            } else {
                                echo $animalperdido[$i]['idade'];
                            }
                            echo '
                            <br>  <br>  <a href="#modalj' . $i . '" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">pets</i>Informações</a>

                            <!-- Modal Structure -->
                            <div id="modalj' . $i . '" class="modal" style="max-height: 400px;">
                            <div class="modal-content">
                            <h4 id="modalj' . $i . '">' . $animalperdido[$i]['nome'] . '</h4>


                            <div class="card">
                            <div class="card-content">';

                            if ($animalperdido[$i]['foto'] == null || $animalperdido[$i]['foto'] == "") {
            // var_dump($i);

                                echo '<img src="views/_images/cachorro.jpg" width="200" class="responsive-img" id="doog">';
                            } else {
                                echo '<img class="material-boxed" src="views/_images/user/animal/perdido/' . $animalperdido[$i]['foto'] . '" width="300" class="responsive-img" id="doog">';
                            }
        // <img class="material-boxed" src="views/_images/cachorro.jpg" width="300">
                            echo '<div class="card">
                            <div class="card-content">
                            <p><b>Descricao:</b> ' . $animalperdido[$i]['descricao'] . '</p>
                            </div></div>
                            </div>
                            </div>


                            <div class="modal-footer">';

                            if($animalperdido[$i]['situacao'] == 0  ){
                                echo '<p style="color:yellow;"><i class="material-icons">warning</i>Animal perdido.</p><br>';

                                echo '<div class="divider"></div>';
                            }

                            if($animalperdido[$i]['situacao'] == 3){
                                echo '<p style="color:red;">Animal se encontra na situação de removido da lista.</p>';

                            }

                            if($animalperdido[$i]['situacao'] == 1){
                                echo '<p style="color:green;">Animal se encontra na situação de adotado.</p>';
                            }

                        if((isset($_SESSION['logado']))&&($_SESSION['id'] == $animalperdido[$i]['usuario_id']) && ($animalperdido[$i]['situacao'] != 3)){ //todo
                            echo '<form method = "post" action = "/deletarperdido">
                            <input type="hidden" name="situacao" value="'.$animalperdido[$i]['id'].'" >
                            <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">pets</i>Remover da lista</button></form><div class="divider"></div>';
                        }

                        echo '<a href="#!" class="modal-action modal-close waves-effect waves-green btn">voltar</a>
                        </div>
                        </div></div></div></div>';
                    }

                } else {
                    echo '<p>Você não tem nenhum animal perdido.</p>';
                }

// print_r($teste);

                ?>

            </div>
        </div>


    </div>

</div>

</div>
</div>


</div>




<!-- FIM -->

<?php if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 1) {

    $consulta = new Usuario();

    $array = $consulta->todosUsuariosAdmin();

    // var_dump($array);

    ?>

    <div id="usuarios" class="col s12">

        <div class="container">
            <div class="card">
                <div class="card-content">

                    <table class="highlight">
                        <thead>
                          <tr>
                              <th>Nome do Usuário</th>
                              <th>Email</th>
                              <th>Grau de acesso</th>
                          </tr>
                      </thead>
                      <?php }?>

                      <tbody>
                        <?php
                        if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 1) {

                            $i = 0;

                            for ($i = 0; $i < count($array); $i++) {

                                echo '<tr><td>' . $array[$i]['nome'] . '</td>';
                                echo '<td>' . $array[$i]['email'] . '</td>';
                                echo '<td>' . $texto = $array[$i]['acesso'] == 1 ? "Admin" : "Usuário" . '</td>';

                            }

                        }
                        ?>

                    </tbody>

                </table></div></div></div></div>
                <?php
/*<tr>
<td>Alvin</td>
<td>alvin@totmail.com</td>
<td>Usuário</td>
<td><a href="#" class="btn">Deletar</a><a href="#" class="btn" style="margin-left:20px;">Editar Acesso</a></td>
</tr>
<tr>
<td>Alan</td>
<td>alan@gotmail.com</td>
<td>Usuário</td>
<td><a href="#" class="btn">Deletar</a><a href="#" class="btn" style="margin-left:20px;">Editar Acesso</a></td>
</tr>
<tr>
<td>Jonathan</td>
<td>jonathan@gmail.com</td>
<td>Admin</td>
<td><a href="#" class="btn">Deletar</a><a href="#" class="btn" style="margin-left:20px;">Editar Acesso</a></td>
</tr>*/
?>

<script>


// Editar nome ************************************************************************************************************

document.getElementById("editNome").addEventListener("click", editNome);

function editNome() {
    document.getElementById("ceditn").innerHTML = "<form method='POST' action='/alterarnome'><label for='editanome'>Digite o seu nome</label><input id='editanome' required type='text' name='editanome'><br><input class='btn' type='submit' value='Editar'><input type='button' class='btn' id='teste' style='margin-left:20px' onclick='mudaNome();' value='Cancelar'></form><br>";

    //Variáveis $_GET['editanome'];
}


// Editar senha *************************************************************************************************************

document.getElementById("editSenha").addEventListener("click", editSenha);

function editSenha() {
    document.getElementById("cedits").innerHTML = "<form method='POST' action='/alterarsenha'><label for='editasenha'>Digite sua nova senha</label><input id='editasenha' required maxlength='8' type='password' name='editasenha'><br><input class='btn' type='submit' value='Editar'><input type='button' class='btn' id='teste' style='margin-left:20px' onclick='mudaSenha();' value='Cancelar'></form><br>";

    //Variáveis $_POST['editasenha'];
}

// Editar email *************************************************************************************************************

document.getElementById("editEmail").addEventListener("click", editEmail);

function editEmail() {
    document.getElementById("cedite").innerHTML = "<form method='POST' action='/alteraremail' class='col s12'><label for='editaemail'>Digite o seu novo email</label><div class='row'><div class='input-field col s12'><input id='editaemail' required type='text' name='editaemail'></div></div><div class='row'><div class='input-field col s12'><input class='btn' type='submit' value='Editar'></div></div><div class='row'><div clas='input-field col s6'><input type='button' class='btn' id='teste' onclick='mudaEmail();' value='Cancelar'></div></div></div></form>";

    //Variáveis $_GET['editaemail'];
}

// Editar estado ************************************************************************************************************

document.getElementById("editEstado").addEventListener("click", editEstado);

function editEstado() {
    document.getElementById("ceditest").innerHTML = "<form method='POST' action='/alterarestado'><label for='editaest'>Digite o digito do seu Estado</label><input maxlength='2' required id='editaest' type='text' name='editaest'><br><input class='btn' type='submit' value='Editar'><input type='button' class='btn' id='teste' style='margin-left:20px' onclick='mudaEstado();' value='Cancelar'></form><br>";

    //Variáveis $_GET['editaest'];
}

// Editar cidade ************************************************************************************************************
document.getElementById("editCidade").addEventListener("click", editCidade);

function editCidade() {
    document.getElementById("ceditc").innerHTML = "<form method='POST' action='/alterarcidade'><label for='editacid'>Digite o nome da cidade</label><input required id='editacid' type='text' name='editaest'><br><input class='btn' type='submit' value='Editar'><input type='button' class='btn' id='teste' style='margin-left:20px' onclick='mudaCidade();' value='Cancelar'></form><br>";

    //Variáveis $_GET['editacid'];
}

// Editar descrição *********************************************************************************************************
document.getElementById("editDesc").addEventListener("click", editDesc);

function editDesc() {
    document.getElementById("ceditc").innerHTML = "<form method='POST' action='/alterardesc'><label for='editadesc'>Digite sua descrição</label><textarea class='materialize-textarea' id='editadesc' name='editadesc'></textarea><br><input class='btn' type='submit' value='Editar'><input type='button' class='btn' id='teste' style='margin-left:20px' onclick='mudaDesc();' value='Cancelar'></form><br>";

    //Variáveis $_GET['editadesc'];
}


// Editar foto **************************************************************************************************************
document.getElementById("editFoto").addEventListener("click", editFoto);

function editFoto() {
    document.getElementById("ceditfoto").innerHTML = "<form method='POST' action='/alterarfoto' enctype='multipart/form-data'>Foto<input type='file' name='foto'><br><input class='btn' type='submit' value='Editar'><input type='button' class='btn' id='teste' style='margin-left:20px' onclick='mudaFoto();' value='Cancelar'></form><br>";

    //Variáveis $_POST['foto'];
}



//Ocultar input de editar nome, ao clicar cancelar
function mudaNome() {

    var display = document.getElementById('ceditn').style.display;

    document.getElementById('ceditn').style.display = 'none';

    location.href = '/logado';
}

//Ocultar input de editar senha, ao clicar cancelar
function mudaSenha() {

    var display = document.getElementById('cedits').style.display;

    document.getElementById('cedits').style.display = 'none';

    location.href = '/logado';
}

//Ocultar input de editar email, ao clicar cancelar
function mudaEmail() {

    var display = document.getElementById('cedite').style.display;

    document.getElementById('cedite').style.display = 'none';

    location.href = '/logado';
}

//Ocultar input de editar estado, ao clicar cancelar
function mudaEstado() {

    var display = document.getElementById('ceditest').style.display;

    document.getElementById('ceditest').style.display = 'none';

    location.href = '/logado';
}


function mudaCidade(){

    var display = document.getElementById('ceditc').style.display;

    document.getElementById('ceditc').style.display = 'none';

    location.href = '/logado';
}

function mudaDesc(){

    var display = document.getElementById('ceditdesc').style.display;

    document.getElementById('ceditdesc').style.display = 'none';

    location.href = '/logado';
}

function mudaFoto(){

    var display = document.getElementById('ceditfoto').style.display;

    document.getElementById('ceditfoto').style.display = 'none';

    location.href = '/logado';
}


</script>
