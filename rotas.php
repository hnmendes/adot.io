<?php

function getPage()
{

    $url = $_SERVER['REQUEST_URI'];     //Método para pegar a URL do servidor:"/adot.io/rotas.php";
    $url = explode('?', $url);  //Método para enfatiar a string se houver "?" e transformar em array.
    $url = $url[0];

    $metodo = $_SERVER['REQUEST_METHOD'];   //Saber o método que está na página, podendo ser GET ou POST.

    if ($metodo == 'GET') {
        switch ($url) {
            case '/' :
                include_once('views/pages/home.php');
                break;

            case '/adot.io/' :
                include_once('views/pages/home.php');

            case '/home' :
                include_once('views/pages/home.php');
                break;

            case '/Home' :
                include_once('views/pages/home.php');
                break;

            case '/listaTeste' :
                include_once('views/pages/listaTeste.php');
                break;

            case '/novidades' :
                include_once ('views/pages/novidades.php');
                break;

            default :
                include_once('views/pages/pageerror.php');
                break;

        }
    }

}