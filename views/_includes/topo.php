<!-- TOPO -->

<!DOCTYPE html>
<html lang="pt-bt">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Adot.io</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="views\_images\cat.png">

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

                <a id="logo-container" href="#" class="brand-logo teal-text text-lighten-1">Adot.io <img width="20" src="views/_images/cat.png"></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/home" class="teal-text text-lighten-1">Inicio</a></li>
                    <li><a href="/ajuda" class="teal-text text-lighten-1 modal-trigger">Ajuda</a></li>
                    <li><a href="animais-para-adocao.html" class="teal-text text-lighten-1">Animais para adoção</a></li>
                    <li><a href="animais-perdidos.html" class="teal-text text-lighten-1">Animais perdidos</a></li>
                    <li><a href="/novidades" class="teal-text text-lighten-1">Novidades</a></li>
                    <?php

                    if(isset($_REQUEST['login'])){

                    }else{
                        echo '<li><a href="#login" class="teal-text text-lighten-1 modal-trigger">Login</a></li>';
                    }
                    ?>

                </ul>

                <ul id="nav-mobile" class="side-nav ">
                    <li><a href="/home"  class="teal-text text-lighten-1">Home</a></li>
                    <li><a href="/ajuda" class="teal-text text-lighten-1">Ajuda</a></li>
                    <li><a href="animais-para-adocao.html" class="teal-text text-lighten-1">Animais para adoção</a></li>
                    <li><a href="animais-perdidos.html" class="teal-text text-lighten-1">Animais perdidos</a></li>
                    <li><a href="#login" class="teal-text text-lighten-1 modal-trigger">Login</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

    </div>
    <!-- Fim da barra de navegação -->
</header>
