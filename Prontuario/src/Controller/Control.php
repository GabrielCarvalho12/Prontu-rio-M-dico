<?php
require_once "ProntuarioMedico/../../Model/Conexao.php";
require_once "ProntuarioMedico/../../Model/connection.php";

class Control
{
    public $query;
    public $db;
    public $espec;
    public $medicos;
    public $pacientes;

    public function EditAgend($id)
    {
        $con = new Conexao();
        $con->SelectEditAgend($id);
        $this->query = $con->getResult();
    }

    public function consultas()
    {
        $con = new Conexao();
        $con->SelectConsultas();
        $this->query = $con->getResult();
    }

    public function estados()
    {
        $con = new Conexao();
        $con->SelectEstado();
        $this->query = $con->getResult();
    }
    public function MedPac()
    {
        $con = new Conexao();
        $con->SelectMedPac();
        $this->medicos = $con->getResultMed();
        $this->pacientes = $con->getResultPac();
    }

    public function cidades()
    {
        $con = new connection();
        $con->conect();
        $this->db = $con->getDb();
    }

    public function especialidades()
    {
        $con = new Conexao();
        $con->SelectEpec();
        $this->espec = $con->getQueryEsp();
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