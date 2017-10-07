<?php
require_once "ProntuarioMedico/../../Model/Conexao.php";
require_once "ProntuarioMedico/../../Model/connection.php";

class Control
{
    public $query;
    public $db;

    public function estados()
    {
        $con = new Conexao();
        $con->SelectEstado();
        $this->query = $con->getResult();
    }

    public function cidades()
    {
        $con = new connection();
        $con->conect();
        $this->db = $con->getDb();
    }


/*    public $ResultEditar;
    public $ResultForm;

    function SelectEditar($id)
    {
        $con = new Conexao();
        $con->Construct();
        $con->SelectUpdate($id);
        $this->ResultEditar=$con->getResult();
        $this->Banco=$con->getBanco();
    }

    function SelectForm()
    {
        $con = new conexao();
        $con->Construct();
        $con->Select();
        $this->ResultForm = $con->getResult();
    }*/

}