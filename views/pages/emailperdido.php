<?php

$foto = $_FILES['foto']['name'];
$usuarioid = $_POST['usuarioid'];
$novo_nome;
$diretorio;

if (isset($_FILES['foto'])){

    $arquivo = $foto; //$_FILES['foto']['name'];

    $extensao = strtolower(substr($arquivo, -4));//Pega a extensao do arquivo

    $novo_nome = $usuarioid.time().".".$extensao;//define o nome do arquivo

    $diretorio = "views/_images/perdidoemail/";//define o diretório para o arquivo vai ser enviado

    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);// efetua o upload 
}

// var_dump($novo_nome);
// var_dump($diretorio);



$email = $_POST['email'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$telefone = $_POST['telefone'];
$descricao = $_POST['descricao'];
$animalid = $_POST['animalid'];

// var_dump($animalperdido[0]['nome']);

$usuario = new Usuario();
$animalperdido = new AnimalPerdido();

// var_dump($animalperdido);

$animalperdido = $animalperdido->getAllById($animalid);
$usuario = $usuario->getEmailById($usuarioid);

// // var_dump($animalperdido);
// // var_dump($usuario);



$mail = new PHPMailer\PHPMailer\PHPMailer;


$mail->CharSet = 'UTF-8';

$mail->isSMTP();

// $mail->SMTPDebug = 2;

$mail->Debugoutput= 'html';

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = 'adot.io.ifpe@gmail.com';

$mail->Password = 'adotio123';

$mail->setFrom('adot.io.ifpe@gmail.com','Adotio');

$mail->addReplyTo('no-reply123124@adotio.com');

$mail->addAddress($usuario[0]['email'], $usuario[0]['nome']);

$mail->Subject = "Olá, ".$usuario[0]['nome'].". O animal cadastrado com o nome de ".$animalperdido[0]['nome']." foi encontrado!";

// $mail->msgHTML(file_get_contents('contents.html'),dirname(__FILE__));

$mail->Body="Olá, ".$usuario[0]['nome'].". Uma pessoa encontrou um cachorro que você colocou na área de perdidos, o email dessa pessoa é ".$email." e o email endereço pela qual ela descreveu foi rua : ".$endereco." , bairro: ".$bairro." e o complemento: ".$complemento." e o telefone da pessoa é ".$telefone.". Além disso ele deu essa descrição: ".$descricao.". Entre em contato com a pessoa por email. 
Muito obrigado por usar nossos serviços, a equipe Adot.io agradece. ";

$mail->AltBody = "Olá, ".$usuario[0]['nome'].". Uma pessoa encontrou um cachorro que você colocou na área de perdidos, o email dessa pessoa é ".$email." e o email endereço pela qual ela descreveu foi rua : ".$endereco." , bairro: ".$bairro." e o complemento: ".$complemento." e o telefone da pessoa é ".$telefone.". Entre em contato com a pessoa por email. 
Muito obrigado por usar nossos serviços, a equipe Adot.io agradece. ";

$mail->AddAttachment($diretorio.$novo_nome);

$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
)
);

if(!$mail->send()){
    echo "Mailer error: ".$mail->ErrorInfo; 
}else{
	echo "<script>alert('Mensagem enviada com sucesso, aguarde o dono lhe contatar, um email foi enviado para ele.');</script>";
	echo '<script>location.href = "/logado";';
}
