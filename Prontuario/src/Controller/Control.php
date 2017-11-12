<?php
require_once "ProntuarioMedico/../../Model/Conexao.php";

class Control
{
    public $query;
    public $queryEstd;
    public $queryCidd;
    public $db;
    public $espec;
    public $medicos;
    public $pacientes;

    public function EditPaciente($cpf)
    {
        $con = new Conexao();
        $con->SelectEditPac($cpf);
        $this->query = $con->getResultEditPac();
    }

    public function EditAtend($id)
    {
        $con = new Conexao();
        $con->SelectEditAtend($id);
        $this->query = $con->getResultEditAtend();
    }

    public function EditAgend($id)
    {
        $con = new Conexao();
        $con->SelectEditAgend($id);
        $this->query = $con->getResult();
    }

    public function EditMedico($crm)
    {
        $con = new Conexao();
        $con->SelectEditMed($crm);
        $this->query = $con->getResultEditMed();
    }

    public function atendimentos()
    {
        $con = new Conexao();
        $con->SelectAtend();
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
        $this->queryEstd = $con->getResult();
    }
    public function MedPac()
    {
        $con = new Conexao();
        $con->SelectMedPac();
        $this->medicos = $con->getResultMed();
        $this->pacientes = $con->getResultPac();
    }

    public function cidades($id)
    {
        $con = new Conexao();
        $con->SelectCidade($id);
        $this->queryCidd = $con->getCidades();
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