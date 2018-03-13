<?php


class Novidade{
	
	private $id;
	private $titulo;
	private $autor;
	private $conteudo;
	private $id_usuario;



//Construtor *****************************************************************************************************************

	public function __construct($titulo = null,$autor = null,$conteudo = null, $id_usuario = null){
		$this->setTitulo($titulo);
		$this->setAutor($autor);
		$this->setConteudo($conteudo);
		$this->setIdUsuario($id_usuario);
	}


//GETTERS AND SETTERS *******************************************************************************************************

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function setAutor($autor){
		$this->autor = $autor;
	}

	public function getConteudo(){
		return $this->conteudo;
	} 

	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}

	public function getIdUsuario(){
		return $this->id_usuario;
	}

	public function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}


//****************************************************************************************************************************

	public function addNovidade(){

		$conn = new Sql();

		try{

			$conn = $conn->connect();
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = ("INSERT INTO novidade(titulo,descricao,usuario_id,autor) VALUES ('".$this->getTitulo()."','".$this->getConteudo()."',".$this->getIdUsuario().",'".$this->getAutor()."');");

			if($this->tituloigual()){
				echo "<script>alert('O titulo já está sendo utilizado, crie uma novidade com um diferente, por favor.');</script>";
                echo '<script>location.href="/novidades"</script>';
			}else{
				$conn->exec($sql);

                echo '<script>alert("Novidade cadastrada com sucesso.");</script>';
                // echo '<script>alert("Você vai ser redirecionado à página inicial.");</script>';
                echo '<script>location.href="/novidades"</script>';
			}
            


		}catch(PDOException $e){
			echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
		}

		$conn = null;

	}


	public function tituloIgual(){

		$conn = new Sql();
        
        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $result = $conn->query("SELECT novidade.titulo FROM novidade INNER JOIN usuario ON usuario.id = novidade.usuario_id WHERE titulo = '".$this->getTitulo()."';")->fetchAll();
            
            $contador = count($result);
            
            if($contador > 0){ //Se encontrar no banco de dados ele retorna verdadeiro.
                // echo '<div class = "container"><div class = "card"><div class = "card-content"> O email se encontra no banco.</div></div></div>';
                return true;
            }else{
                // echo '<div class = "container"><div class = "card"><div class = "card-content"> O email não se encontra no banco.</div></div></div>';
                return false;
            }
            
            
        }
        
        catch(PDOException $e){
            echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            
        }
        
        $conn = null;
	}


	public function consultaNovidades(){

		$conn = new Sql();

        try{

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT novidade.id,novidade.titulo,novidade.descricao,novidade.autor FROM novidade INNER JOIN usuario ON usuario.id = novidade.usuario_id;")->fetchAll(PDO::FETCH_ASSOC);
            
            // $contador = count($result);

            $arrayId = array();

            $arrayId = $result;


            return $arrayId;

                
        }catch(PDOException $e){
            echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
        }

        $conn = null;
	}



	public function deletarNovidade($id){

		$conn = new Sql();

        try{

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("DELETE novidade.* FROM novidade WHERE id = $id;");
            
            if($result){
            	return true;
            }else{
            	return false;
            }

                
        }catch(PDOException $e){
            echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
        }

        $conn = null;

	}



}