<?php

/*
$teste = "Olá mundo!";

$teste = md5($teste);

$teste2 = "8d595f21e04dffc4f863bb7d37940b78";

if($teste == $teste2){
    echo 'são iguais';
}

echo '<br>.<br>.<br>.<br><br>';

*/

function d($variavelDumpada){
    return var_dump($variavelDumpada);
}


$usuario = new Usuario();


$usuario->login("joseti@gotmail.com","123");



//Inserção via MYSQLI Classe.

/*

$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "adotio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Falha de conexão: " . $conn->connect_error);
}

$sql = "INSERT INTO usuario (nome, email, estado, municipio, senha)
VALUES ('Paulo José', 'joseti@gotmail.com', 'PE', 'RECIFE','123')";

if ($conn->query($sql) === TRUE) {
    echo '<div class = "container"><div class = "card"><div class = "card-content"> Gravação feita com sucesso.</div></div></div>';
} else {
    echo '<div class = "container"><div class = "card"><div class = "card-content"> Erro : '. $sql . "<br>" . $conn->error.'</div></div></div>' ;
}

$conn->close();
*/

//Inserção via PDO classe.

/*
$servername = "127.0.0.1";
$username = "root";
$password = "1234";
$dbname = "adotio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($conn);
    $sql = "INSERT INTO usuario (nome, email, estado, municipio, senha)
VALUES ('Joaninha Linda', 'joanajose@gotmail.com', 'PE', 'RECIFE','123')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo '<div class = "container"><div class = "card"><div class = "card-content"> Gravação feita com sucesso.</div></div></div>';
}
catch(PDOException $e)
{
    echo '<div class = "container"><div class = "card"><div class = "card-content">'. $sql . "<br>" . $e->getMessage().'</div></div></div>';
}

$conn = null;
*/



//TESTE MINHA CLASSE


/*$usuario = new Usuario("João Aurélio","aurelito@jrymail.com","PE","RECIFE","123");

var_dump($usuario->cadastrarUsuario());
*/

?>



<!-- <script type="text/javascript"> 
	/*String.prototype.stripHTML = function() {return this.replace(/<.*?>/g, '');}

	//Exemplo de utilização
	var txt = "<p>este é <u>apenas</u> um <b>teste</b> para a função <i>stripHTML</i>.</p>";
	txt = txt.stripHTML();

	document.write(txt);

	var txt2 = "<p><b>Testando com tags html</b></p>";

	document.write(txt2);
	*/
	
 </script>  -->