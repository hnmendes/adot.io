<?php

function getPage()
{

    $url = $_SERVER['REQUEST_URI'];         //Método para pegar a URL do servidor:"/adot.io/rotas.php";
    $url = explode('?', $url);              //Método para enfatiar a string se houver "?" e transformar em array.
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
                include_once('views/pages/ajuda.php');
                break;

            case '/novidades' :
                include_once ('views/pages/novidades.php');
                break;

            case '/ajuda' :
                include_once ('views/pages/ajuda.php');
                break;

            case '/logado' :
                include_once('views/pages/logado.php');
                break;

            case '/deslogin' :
                include_once('views/pages/deslogin.php');
                break;

            case '/adocao' :
                include_once('views/pages/adocao.php');
                break;

            case '/perdido' :
                include_once('views/pages/perdido.php');
                break;

            case '/encontrar' :
                include_once('views/pages/encontrar.php');
                break;

            case '/adicionaradocao' :
                include_once('views/pages/adicionaanimal.php'); //Página do formulário de adicionar animal lá na lista de adoção.
                break;

            default :
                include_once('views/pages/pageerror.php');
                break;

        }
    }else if ($metodo == 'POST'){

        switch($url) {
            
            case '/login' :
                include_once('controllers/login.php');
                break;

            case '/cadastro' :
                include_once('controllers/cadastro.php');
                break;

            case '/alterarnome' :
                include_once('views/pages/alterarnome.php');
                break;

            case '/alterarsenha' :
                include_once('views/pages/alterarsenha.php');
                break;

            case '/alteraremail' :
                include_once('views/pages/alteraremail.php');
                break;

            case '/alterarcidade' :
                include_once('views/pages/alterarcidade.php');
                break;

            case '/alterardesc' :
                include_once('views/pages/alterardescricao.php');
                break;

            case '/alterarfoto' :
                include_once('views/pages/alterarimagem.php');
                break;

            case '/addnovidade' :
                include_once('views/pages/addnovidade.php');
                break;

            case '/deletarnovidade' :
                include_once('views/pages/delnovidade.php');
                break;

            case '/adotado' :
                include_once('views/pages/addadocao.php');
                break;

            case '/deletaradocao' :
                include_once('views/pages/deladocao.php');
                break;

            case '/readdadocao' :
                include_once('views/pages/readdadocao.php');
                break;

            case '/addlistaadocao' :
                include_once('views/pages/addlistaadocao.php'); //Dados posts da página do formulário pra add na lista de adoção.
                break;
        }       
    }

}