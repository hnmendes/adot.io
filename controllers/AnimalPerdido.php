<?php

class AnimalPerdido extends Animal
{

    public function __construct($nome = null, $raca = null, $idade = null, $tipo = null, $porte = null, $descricao = null)
    {
        $this->setNome($nome);
        $this->setRaca($raca);
        $this->setIdade($idade);
        $this->setTipo($tipo);
        $this->setPorte($porte);
        $this->setDescricao($descricao);
    }

    public function getAll()
    {

        $conn = new Sql();

        try {
            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT * FROM animais_perdidos WHERE situacao = 0")->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getIdAnimal($nome)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT animais_perdidos.id FROM animais_perdidos WHERE animais_perdidos.nome = '" . $nome . "';")->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content"><br>' . $e->getMessage() . '</div></div></div>';
        }

        $conn = null;
    }

    public function getAllByUserId($id)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT DISTINCT animais_perdidos.* FROM animais_perdidos INNER JOIN usuario ON animais_perdidos.usuario_id WHERE animais_perdidos.usuario_id = " . $id . ";")->fetchAll(PDO::FETCH_ASSOC);

            return $result;

            /*

        | id         | int(11)      | NO   | PRI | NULL    |       |
        | nome       | varchar(255) | NO   |     | NULL    |       |
        | idade      | int(11)      | YES  |     | NULL    |       |
        | raca       | varchar(255) | NO   |     | NULL    |       |
        | porte      | varchar(255) | NO   |     | NULL    |       |
        | foto       | varchar(255) | NO   |     | NULL    |       |
        | descricao  | text         | YES  |     | NULL    |       |
        | usuario_id | int(11)      | NO   | MUL | NULL    |       |
        +------------+--------------+------+-----+---------+-------+

         */

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content">' . $conn . "<br>" . $e->getMessage() . '</div></div></div>';
        }

        $conn = null;
    }

    public function setSituacaoEncontrado($id)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->prepare("UPDATE animais_perdidos SET situacao = 1 WHERE id = " . $id . ";");

            if ($result->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content">' . $conn . "<br>" . $e->getMessage() . '</div></div></div>';
        }

        $conn = null;
    }

    public function setSituacaoRemovido($id)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->prepare("UPDATE animais_perdidos SET situacao = 3 WHERE id = " . $id . ";");

            if ($result->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content">' . $conn . "<br>" . $e->getMessage() . '</div></div></div>';
        }

        $conn = null;
    }

    public function resetSituacaoNaLista($id)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->prepare("UPDATE animais_perdidos SET situacao = 0 WHERE id = " . $id . ";");

            if ($result->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content">' . $conn . "<br>" . $e->getMessage() . '</div></div></div>';
        }

        $conn = null;
    }

    public function addImagem($imagem, $id, $animalId)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_FILES['foto-animal'])) {

                $arquivo = $imagem; //$_FILES['foto']['name'];

                $extensao = strtolower(substr($arquivo, -4)); //Pega a extensao do arquivo

                $novo_nome = $id . time() . $extensao; //define o nome do arquivo

                $diretorio = "views/_images/user/animal/perdido/"; //define o diretório para o arquivo vai ser enviado

                move_uploaded_file($_FILES['foto-animal']['tmp_name'], $diretorio . $novo_nome); // efetua o upload

                $sql = "UPDATE animais_perdidos SET foto ='" . $novo_nome . "' WHERE id =" . $id . "; ";

                $query = $conn->query($sql);

                // var_dump($query);

                if ($query) {

                    $this->setFoto($novo_nome);

                    // echo '<script>alert("teste");</script>';
                }

            }

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content"> "<br>"';

            $e->getMessage();

            echo '</div></div></div>';
        }
        $conn = null;
    }

    public function registraAnimal($usuario_id, $imagem)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($this->checarNome($this->getNome()) != true) {

                $sql = "INSERT INTO animais_perdidos(nome,raca,idade,tipo,porte,descricao,usuario_id) values ('" . $this->getNome() . "','" . $this->getRaca() . "'," . $this->getIdade() . ",'" . $this->getTipo() . "','" . $this->getPorte() . "','" . $this->getDescricao() . "'," . $usuario_id . ");";
                $conn->prepare($sql);
                $conn->exec($sql);

                $id = $this->getIdAnimal($this->getNome()); //Id do animal.

                if (isset($_FILES['foto-animal'])) {

                    $arquivo = $imagem; //$_FILES['foto']['name'];

                    $extensao = strtolower(substr($arquivo, -4)); //Pega a extensao do arquivo

                    $novo_nome = $id[0]['id'] . time() . $extensao; //define o nome do arquivo

                    $diretorio = "views/_images/user/animal/perdido/"; //define o diretório para o arquivo vai ser enviado

                    move_uploaded_file($_FILES['foto-animal']['tmp_name'], $diretorio . $novo_nome); // efetua o upload

                    $sql = "UPDATE animais_perdidos SET foto ='" . $novo_nome . "' WHERE id =" . $id[0]['id'] . "; ";

                    $query = $conn->query($sql);

                    $this->setFoto($novo_nome);
                }

                echo '<script>alert("Cadastro realizado com sucesso.");</script>';
                echo '<script>alert("Você vai ser redirecionado à página da sua conta.");</script>';
                echo '<script>location.href="/logado"</script>';

            } else {

                echo '<script>alert("Nome já existe, por favor cadastre com outro nome.");</script>';
                echo '<script>location.href="/logado"</script>';
            }

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content">' . $sql . "<br>" . $e->getMessage() . '</div></div></div>';
        }

        $conn = null;

    }

    public function checarNome($nome)
    {

        $conn = new Sql();

        try {

            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT * FROM animais_perdidos where nome = '" . $nome . "';")->fetchAll();

            $contador = count($result);

            if ($contador > 0) { //Se encontrar no banco de dados ele retorna verdadeiro.
                // echo '<div class = "container"><div class = "card"><div class = "card-content"> O email se encontra no banco.</div></div></div>';
                return true;
            } else {
                // echo '<div class = "container"><div class = "card"><div class = "card-content"> O email não se encontra no banco.</div></div></div>';
                return false;
            }

        } catch (PDOException $e) {
            echo '<div class = "container"><div class = "card"><div class = "card-content">' . $conn . "<br>" . $e->getMessage() . '</div></div></div>';

        }

        $conn = null;

    }

    public function getAllById($id){

        $conn = new Sql();

        try{
            $conn = $conn->connect();

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->query("SELECT * FROM animais_perdidos WHERE id = $id;")->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


}

/*    private $id;
private $nome;
private $raca;
private $porte;
private $foto;
private $descricao;
private $usuario_id;
 */
