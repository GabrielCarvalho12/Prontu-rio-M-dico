<?php


class Conexao
{
    private $servidor;
    private $usuario;
    private $senha;
    private $nomeBanco;
    private $banco;
    private $result;


    function Construct($servidor = "localhost", $usuario = "root", $senha = "", $nomeBanco="prontuario")
    {
        $this->setServidor($servidor);
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setNomeBanco($nomeBanco);
        $this->Conectar();
    }

    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }


    public function getServidor()
    {
        return $this->servidor;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function getSenha()
    {
        return $this->senha;
    }


    public function setNomeBanco($nomeBanco)
    {
        $this->nomeBanco = $nomeBanco;
    }


    public function getNomeBanco()
    {
        return $this->nomeBanco;
    }

    public function Conectar()
    {
        $this->banco = new MySQLi
        (
            $this->getServidor(),
            $this->getUsuario(),
            $this->getSenha(),
            $this->getNomeBanco()
        );
        if ($this->banco->connect_error)
        {
            die('Erro de conexão('. $this->banco->connect_errno . '):'
            . $this->banco->connect_error);
        }

    }

    public function SelectEstado()
    {
        $this->Construct();

        $query = "SELECT cod_estados, sigla FROM estados ORDER BY sigla";

        $this->result = mysqli_query($this->getBanco(),$query);

    }

    public  function  Select()
    {
        $query = "SELECT * FROM contatos";

        $this->result = mysqli_query($this->getBanco(),$query);
    }

    public  function  SelectUpdate($id)
    {
        $query = "SELECT * FROM contatos WHERE id = $id";

        $this->result = mysqli_query($this->getBanco(),$query);
    }

    public function Inserir($nome,$email,$celular)
    {
        $query = "INSERT INTO contatos (nome, email, celular) 
                  VALUES ('".$nome."', '".$email."', '".$celular."')";

        $inserir = mysqli_query($this->getBanco(),$query);
        if ($inserir) {

        } else {
            echo "Não foi possível inserir o contato, tente novamente.";
            echo "Dados sobre o erro:" . mysqli_error($this->getBanco());
        }

    }

    public function Uptade($id,$nome,$email,$celular)
    {
        $query = "UPDATE contatos 
                  SET nome = '".$nome."', email = '".$email."', celular = '".$celular."' 
                  WHERE id = '".$id."' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

        } else {
            echo "Não foi possível atualizar o contato, tente novamente.";
            echo "Dados sobre o erro:" . mysqli_error($this->getBanco());
        }

    }

    function Delete($id)
    {
        $query = "DELETE FROM contatos WHERE id = '".$id."'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

        } else {
            echo "Não foi possível deletar o contato, tente novamente.";
            echo "Dados sobre o erro:" . mysqli_error($this->getBanco());
        }
    }


    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getBanco()
    {
        return $this->banco;
    }


    public function Desconectar()
    {
        mysqli_close($this->getBanco());
    }


}

?>