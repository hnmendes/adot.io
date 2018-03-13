<!-- TOPO -->

<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Adot.io</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="views/_images/cat.png">

    <!-- CSS  -->
    <link href="views\_css\css\fonts.css" rel="stylesheet"/>
    <link href="views\_css\css\materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="views\_css\css\style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


    <!-- SOLUCAO PARA O NAVBAR-MOBILE-->
    <style type="text/css">
        .navbar-fixed {
            z-index: 998;
        }
    </style>


</head>
<body>

<header>
    <!-- Barra de navegação -->
    <div class="navbar-fixed">
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">

                <a id="logo-container" href="/home" class="brand-logo teal-text text-lighten-1">Adot.io <img width="20" src="views/_images/cat.png"></a>
                <ul class="right hide-on-med-and-down">
                   <!-- <li><a href="/home" class="teal-text text-lighten-1">Inicio</a></li> -->
                    <li><a href="/ajuda" class="teal-text text-lighten-1 modal-trigger">Ajuda</a></li>
                    <li><a href="/adocao" class="teal-text text-lighten-1">Animais para adoção</a></li>
                    <li><a href="/perdido" class="teal-text text-lighten-1">Animais perdidos</a></li>
                    <li><a href="/novidades" class="teal-text text-lighten-1">Novidades</a></li>
                    <!--<li><a href="#" class="teal-text grey" style="margin-left: 20px;">Bom dia, Henrique.</a></li>-->
                
    

                    <?php

                    session_start();

                    if(isset($_SESSION['logado'])){
                        

                                 echo '<a class="dropdown-button btn" href="#" data-activates="dropdown1">'.$_SESSION['nome'].'</a><ul id="dropdown1" class="dropdown-content"><li><a class="teal-text text-lighten-1" href="/logado">Minha conta</a></li><li><a class="teal-text text-lighten-1" href="/deslogin">Sair</a></li></ul>';


                        // echo '<li><a class="btn" href="/deslogin">Sair</a><li>';
                        // echo '<p class"paragrafo_topo"> Olá '.$_SESSION['nome'].' bem vindo.</p>';
                    }else{
                        echo '<li><a href="#login" class="teal-text text-lighten-1 modal-trigger">Login</a></li>';
                    }

           

                    ?>

                </ul>

                <ul id="nav-mobile" class="side-nav ">
                    <li><a href="/home" class="teal-text text-lighten-1">Home</a></li>
                    <li><a href="/ajuda" class="teal-text text-lighten-1">Ajuda</a></li>
                    <li><a href="/adocao" class="teal-text text-lighten-1">Animais para adoção</a></li>
                    <li><a href="/perdido" class="teal-text text-lighten-1">Animais perdidos</a></li>
                    <li><a href="/novidades" class="teal-text text-lighten-1">Novidades</a></li>
                    <?php
                        if(isset($_SESSION['logado'])){
                            echo '<li><a class="teal-text" href="/logado">Minha conta</a></li><li><a class="btn" href="/deslogin">Sair</a><li>';
                        }else{
                            echo '<li><a href="#login" class="teal-text text-lighten-1 modal-trigger">Login</a></li>';
                        }
                    ?>


                </ul>
                
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

            </div>
            <?php /*if(isset($_SESSION['logado'])){
                            echo ' <p style="margin-left:1000px; margin-top:-90px; color:white;"> Olá '.$_SESSION['nome'].' bem vindo.</p>';
                      }  
                    */
                ?>
        </nav>

    </div>
    <!-- Fim da barra de navegação -->
</header>
