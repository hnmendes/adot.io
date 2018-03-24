<?php

if(isset($_SESSION['logado'])){
	
	
}else{
	echo '<script>alert("Você precisa estar logado para poder entrar em contato com a pessoa.");</script>';
	header("Location: /adocao");
}

$idAnimalUsuario = $_POST['usuarioAnimal'];
$idUsuarioLogado = $_POST['logado'];
$idAnimal = $_POST['idanimal'];

$animal = new AnimalAdocao();
$usuarioLogado = new Usuario();
$usuarioAnimal = new Usuario();

$emailAnimal = $usuarioAnimal->getEmailById($idAnimalUsuario);
$emailLogado = $usuarioLogado->getEmailById($idUsuarioLogado);
$dadosAnimal = $animal->getAllById($idAnimal);

// var_dump($dadosAnimal[0]['nome']);



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

$mail->addAddress($emailAnimal[0]['email'], $emailAnimal[0]['nome']);

$mail->Subject = "Olá, ".$emailAnimal[0]['nome'].". O animal cadastrado com o nome de ".$dadosAnimal[0]['nome']." tem um pretendente.";

// $mail->msgHTML(file_get_contents('contents.html'),dirname(__FILE__));

$mail->Body="Olá, ".$emailAnimal[0]['nome'].". Uma pessoa se interessou pelo cachorro que você colocou para adoção, o nome da pessoa é ".$emailLogado[0]['nome']." e o email dessa pessoa é ".$emailLogado[0]['email']." .Entre em contato com a pessoa por email. 
Muito obrigado por usar nossos serviços, a equipe Adot.io agradece. ";

$mail->AltBody = "Olá, ".$emailAnimal[0]['nome'].". Uma pessoa se interessou pelo cachorro que você colocou para adoção, o nome da pessoa é ".$emailLogado[0]['nome']." e o email dessa pessoa é ".$emailLogado[0]['email']." .Entre em contato com a pessoa por email. 
Muito obrigado por usar nossos serviços, a equipe Adot.io agradece. ";

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
