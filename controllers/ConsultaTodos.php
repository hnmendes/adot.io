<?php



class ConsultaTodos{


	public function todosUsuarios(){
		
		$conn = new Sql();

		try{

			$conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $conn->prepare("SELECT nome,email,acesso FROM usuario;");

            $query->execute();

            $result = $query->fetch();

            // $dado = array_shift($result);
            // $dado = $conn->query("SELECT nome,email,acesso FROM usuario;")->fetchAll(PDO::FETCH_ASSOC);

            $contador = count($result);

            // var_dump($result->nome);

            $arrayUsuario = array();

             if($contador>0){

                while($dado = $result < $contador){

                	$user = new Usuario();

                    $nome = $result['nome'];
                    $email = $result['email'];
                    $acesso = $result['acesso'];

                    $user->setNome($nome);
                    $user->setEmail($email);
                    $user->setAcesso($acesso);

                    $arrayUsuario[] = $user;
                }
            }

            return $arrayUsuario;

		}catch(PDOException $e){
			echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
		}
	}
}