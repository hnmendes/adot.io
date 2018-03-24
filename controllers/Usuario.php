<?php

class Usuario{

    private $idusuario;
    private $nome;
    private $email;
    private $estado;
    private $municipio;
    private $senha;
    private $foto;
    private $descricao;
    private $acesso;

/************************************ GETTERS AND SETTERS***************************************************************/
    
    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($alteracao){
        $this->idusuario = $alteracao;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($alteracao){
        $this->nome = $alteracao;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($alteracao){
        $this->email = $alteracao;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($alteracao){
        $this->estado = $alteracao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($alteracao){
        $this->descricao = $alteracao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($alteracao){
        $this->foto = $alteracao;
    }

    public function getMunicipio(){
        return $this->municipio;
    }

    public function setMunicipio($alteracao){
        $this->municipio = $alteracao;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($alteracao){
        $this->senha = $alteracao;
    }
    
    public function getAcesso(){
        return $this->acesso;
    }

    public function setAcesso($acesso){
        $this->acesso = $acesso;
    }


    /*********************************************** FIM DOS GETTERS AND SETTERS**********************************************/

    //--------------------------------------------------------------------------------------------------------------------------
    
    /*********************************************** CONSTRUTORES OU MÉTODOS MÁGICOS ******************************************/
    
    public function __construct($nome = null, $email = null, $estado = null, $municipio = null, $senha = null){
          $this->setNome($nome);
          $this->setEmail($email);
          $this->setEstado($estado);
          $this->setMunicipio($municipio);
          $this->setSenha($senha);
    }
    


    public function __toString(){  //Construtor ou método mágico __toString, serve pra quando chamar Usuário() e der um echo, ele imprimir todas as informações.
        return json_encode(array(
            "id" => $this->getIdusuario(),
            "nome" => $this->getNome(),
            "email" => $this->getEmail(),
            "estado" => $this->getEstado(),
            "municipio" => $this->getMunicipio(),
            "senha" => $this->getSenha(),
            "conversa_id" => $this->getConversa(),
            "foto" => $this->getConversa()
        ));
    }



    //*********************************LOGIN*********************************************************************************

    public function login($email,$senha){
        

        $conn = new Sql();
        
        try {
            $conn = $conn->connect();
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $result = $conn->query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha';")->fetchAll();

            $dado = $conn->query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha';")->fetch(PDO::FETCH_ASSOC);
            
            $contador = count($result);
            
            if($contador > 0){ //Se encontrar no banco de dados ele retorna verdadeiro.
                //echo '<div class = "container"><div class = "card"><div class = "card-content"> Logado com sucesso.</div></div></div>';
                // $_SESSION['logado'] = 1;

                $this->setIdusuario($dado['id']);
                $this->setNome($dado['nome']);  
                $this->setEmail($dado['email']);
                $this->setEstado($dado['estado']);
                $this->setMunicipio($dado['municipio']);
                $this->setDescricao($dado['descricao']);
                $this->setFoto($dado['foto']);
                $this->setAcesso($dado['acesso']);

                $_SESSION['id'] = $this->getIdusuario();
                $_SESSION['nome'] = $this->getNome();
                $_SESSION['email'] = $this->getEmail();
                $_SESSION['estado'] = $this->getEstado();
                $_SESSION['municipio'] = $this->getMunicipio();
                $_SESSION['descricao'] = $this->getDescricao();
                $_SESSION['foto'] = $this->getFoto();
                $_SESSION['acesso'] = $this->getAcesso();


                return true;
            }else{
                //echo '<div class = "container"><div class = "card"><div class = "card-content"> Email ou senha incorretos.</div></div></div>';
                return false;
            }
            
            
        }
        
        catch(PDOException $e){
            echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            
        }
        
        $conn = null;
           

    }

    //***********************************************DESLOGAR****************************************************************

    public function deslogar(){
        
            session_start();
            session_destroy();
            session_unset();

            echo "<script>alert('Delogado com sucesso!');</script>";
        
    }
    
    
    public function registraUsuario(){
        
        $conn = new Sql();
        
        try {

            $conn = $conn->connect();
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO usuario (nome, email, estado, municipio, senha) VALUES ('$this->nome', '$this->email', '$this->estado', '$this->municipio','$this->senha')";

            
            if($this->checarEmail()){ //Se encontrar no banco de dados ele retorna verdadeiro.
                echo "<script>alert('Email já está sendo utilizado, cadastre-se com um diferente, por favor.');</script>";
                echo '<script>location.href="/home"</script>';
            }else{
                $conn->exec($sql);

                echo '<script>alert("Cadastro realizado com sucesso.");</script>';
                echo '<script>alert("Você vai ser redirecionado à página inicial.");</script>';
                echo '<script>location.href="/home"</script>';
            }
            
        }
        
        catch(PDOException $e){
            echo '<div class = "container"><div class = "card"><div class = "card-content">'. $sql . "<br>" . $e->getMessage().'</div></div></div>';
        }
        
        $conn = null;
        
        
    }
    
    //*****************************************CHECAR EMAIL NO CADASTRO******************************************************
    
    public function checarEmail(){ //Método para checar no banco se o email já existe.
        
        
        $conn = new Sql();
        
        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $emailTemp = $this->email;
            
            $result = $conn->query("SELECT * FROM usuario where email = '$emailTemp';")->fetchAll();
            
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
    
    //***************************************************CHECAR EMAIL LOGIN**************************************************
    
    public function checarEmailLogin($email){
        
        $conn = new Sql();
        
        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $emailTemp = $email;
            
            $result = $conn->query("SELECT * FROM usuario where email = '$emailTemp';")->fetchAll();
            
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

    //*************************************************EDITAR NOME***********************************************************

    public function editarNome($nome){

        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

            try{

                $conn = $conn->connect();

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->query("UPDATE usuario SET nome = '$nome' WHERE id = ".$id.";");

                if($query != false){
                    $_SESSION['nome'] = $nome;
                    $this->setNome($nome);
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }

            }catch(PDOException $e){
                echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            }
        }else{
            echo '<script>alert("Você deve está logado para fazer a alteração.");</script>';
            echo '<script>location.href="/home";</script>';
        }

        $conn = null;

    }

    //***********************************************EDITAR EMAIL************************************************************

    public function editarEmail($email){
        
        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

            try{

                $conn = $conn->connect();

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->query("UPDATE usuario SET email = '$email' WHERE id = ".$id.";");

                if($query != false){
                    $_SESSION['email'] = $email;
                    $this->setEmail($email);
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }

            }catch(PDOException $e){
                echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            }
        }else{
            echo '<script>alert("Você deve está logado para fazer a alteração.");</script>';
            echo '<script>location.href="/home";</script>';
        }

        $conn = null;
    }

    //************************************************EDITAR CIDADE**********************************************************

    public function editarCidade($cidade){

        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

            try{

                $conn = $conn->connect();

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->query("UPDATE usuario SET municipio = '$cidade' WHERE id = ".$id.";");

                if($query != false){
                    $_SESSION['cidade'] = $cidade;
                    $this->setMunicipio($cidade);
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }

            }catch(PDOException $e){
                echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            }
        }else{
            echo '<script>alert("Você deve está logado para fazer a alteração.");</script>';
            echo '<script>location.href="/home";</script>';
        }

        $conn = null;
    }

    //******************************************EDITAR ESTADO****************************************************************

    public function editarEstado($estado){

        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

            try{

                $conn = $conn->connect();

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->query("UPDATE usuario SET estado = '$estado' WHERE id = ".$id.";");

                if($query != false){
                    $_SESSION['estado'] = $estado;
                    $this->setEmail($estado);
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }

            }catch(PDOException $e){
                echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            }
        }else{
            echo '<script>alert("Você deve está logado para fazer a alteração.");</script>';
            echo '<script>location.href="/home";</script>';
        }

        $conn = null;
    }

    //********************************************EDITAR SENHA***************************************************************

    public function editarSenha($senha){
        
        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

            try{

                $conn = $conn->connect();

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->query("UPDATE usuario SET senha = '$senha' WHERE id = ".$id.";");

                if($query != false){
                    $_SESSION['senha'] = $senha;
                    $this->setEmail($senha);
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }

            }catch(PDOException $e){
                echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            }
        }else{
            echo '<script>alert("Você deve está logado para fazer a alteração.");</script>';
            echo '<script>location.href="/home";</script>';
        }

        $conn = null;
    }

    //*************************************************EDITAR DESCRIÇÃO******************************************************

    public function editarDescricao($descricao){

        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

            try{

                $conn = $conn->connect();

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $conn->query("UPDATE usuario SET descricao = '$descricao' WHERE id = ".$id.";");

                if($query != false){
                    $_SESSION['descricao'] = $descricao;
                    $this->setEmail($descricao);
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }

            }catch(PDOException $e){
                echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
            }
        }else{
            echo '<script>alert("Você deve está logado para fazer a alteração.");</script>';
            echo '<script>location.href="/home";</script>';
        }

        $conn = null;
    }

    //********************************************EDITAR IMAGEM**************************************************************

    public function editarImagem($imagem){

        $conn = new Sql();

        if(isset($_SESSION['logado'])){

            $id = $_SESSION['id'];

        try{

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          
            if (isset($_FILES['foto'])){

                $arquivo = $imagem; //$_FILES['foto']['name'];

                $extensao = strtolower(substr($arquivo, -4));//Pega a extensao do arquivo

                $novo_nome = $id.time().$extensao;//define o nome do arquivo

                $diretorio = "views/_images/user/";//define o diretório para o arquivo vai ser enviado

                move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);// efetua o upload 

                $sql = "UPDATE usuario SET foto ='$novo_nome' WHERE id =".$id."; ";

                $query = $conn->query($sql);

                if($query != false){
                    // session_start();
                    $this->setFoto($novo_nome);
                    $_SESSION['foto'] = $this->getFoto();
                    echo '<script>alert("Alterado com sucesso.");</script>';
                    echo '<script>location.href="/logado";</script>';
                }
            }

        }catch(PDOException $e){
             echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
        } 

    }

    $conn = null;

}



public function todosUsuariosAdmin(){
        
        $conn = new Sql();

        try{

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT nome,email,acesso FROM usuario;")->fetchAll(PDO::FETCH_ASSOC);

            $dado = $conn->query("SELECT * FROM usuario;")->fetch(\PDO::FETCH_ASSOC);
            
            $contador = count($result);

            $arrayUsuarios = array();

            $arrayUsuarios = $result;


            return $arrayUsuarios;



                
        }catch(PDOException $e){
            echo '<div class = "container"><div class = "card"><div class = "card-content">'. $conn . "<br>" . $e->getMessage().'</div></div></div>';
        }

        $conn = null;
    }



    public function getLocalById($id){

        $conn = new Sql();

        try{
            $conn = $conn->connect();
            
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT municipio,estado FROM usuario WHERE id = ".$id.";")->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $conn = null;

    }


    public function getEmailById($id){
        $conn = new Sql();

        try{
            $conn = $conn->connect();
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT email,nome FROM usuario WHERE id = ".$id.";" )->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $conn = null;
    }


    public function desativarUsuario($id){
        
        $conn = new Sql();

        try{
            $conn = $conn->connect();
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($conn->query("DELETE FROM usuario WHERE id=".$id.";" )){
                echo '<script>alert("Usuário apagado com sucesso.");</script>';
                session_destroy();
                echo '<script>location.href="/home"</script>';

            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $conn = null;
    }


    


}