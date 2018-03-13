<?php
require_once('controllers/Animal.php');
require_once('controllers/AnimalAdocao.php');
require_once('controllers/AnimalPerdido.php');
require_once('controllers/Novidade.php');
require_once('controllers/ConsultaTodos.php');
require_once('controllers/Usuario.php');
require_once('controllers/Sql.php');

require_once('rotas.php');

require_once('views/_includes/topo.php');
getPage();
require_once('views/_includes/modais.php');
require_once('views/_includes/rodape.php');
