<?php


class Conexao
{
    private $servidor;
    private $usuario;
    private $senha;
    private $nomeBanco;
    private $banco;
    private $result;
    private $resultMed;
    private $resultPac;
    private $queryEsp;
    private $NomeEspec=[];


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

    public function SelectConsultas()
    {
        $this->Construct();

        $query = "Select cod_agendamento as id, data, hora, m.nome as medico, p.nome as paciente
                  From agendamento as a
                  Inner Join medico as m On a.medico_crm = m.crm
                  Inner Join paciente as p On a.paciente_cpf = p.cpf ";

        $this->result = mysqli_query($this->getBanco(),$query);

    }

    public function SelectEditAgend($id)
    {
        $this->Construct();

        $query = "Select cod_agendamento as id, data, hora, m.nome as medico, p.nome as paciente
                  From agendamento as a
                  Inner Join medico as m On a.medico_crm = m.crm
                  Inner Join paciente as p On a.paciente_cpf = p.cpf 
                  WHERE cod_agendamento = '$id'";

        $this->result = mysqli_query($this->getBanco(),$query);

    }

    public function SelectEstado()
    {
        $this->Construct();

        $query = "SELECT cod_estados, sigla FROM estados ORDER BY sigla";

        $this->result = mysqli_query($this->getBanco(),$query);

    }

    public function SelectEpec()
    {
        $this->Construct();

        $query = "SELECT id, nome FROM especialidades ORDER BY nome";

        $this->queryEsp = mysqli_query($this->getBanco(),$query);

    }

    public  function especialidades($espec)
    {
        $this->Construct();

        $query = "SELECT nome FROM especialidades WHERE id in ($espec) ORDER BY nome";

        $con = mysqli_query($this->getBanco(),$query);

        while ( $row = mysqli_fetch_assoc( $con ) ) {
            $this->NomeEspec[] = $row["nome"];

        }
    }

    public  function  SelectMedPac()
    {
        $this->Construct();

        $queryPac = "SELECT cpf, nome FROM paciente ORDER BY nome";

        $queryMed = "SELECT crm, nome FROM medico ORDER BY nome";

        $this->resultPac = mysqli_query($this->getBanco(),$queryPac);
        $this->resultMed = mysqli_query($this->getBanco(),$queryMed);
    }


    public function InserirMedico ($crm, $nome, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $cpf, $rg,
                             $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $trabalho, $especialidades=[])
    {
        $this->Construct();

        $espec =implode($especialidades, ",");
        $this->especialidades($espec);

        $data_sql= date("Y-m-d", strtotime($data_nascimento));

        $especnome=implode($this->NomeEspec,", ");

            $query = "INSERT INTO medico (crm,nome,endereco,complemento,bairro,cidade,estado,cep,cpf,rg,
                  data_nascimento,naturalidade,nacionalidade,email,telefone,celular,trabalho,especialidades)
                  VALUES ('$crm', '$nome', '$endereco', '$complemento', '$bairro',
                  (SELECT nome FROM cidades WHERE cod_cidades = '$cidade' ORDER BY nome),
                  (SELECT nome FROM estados where cod_estados = '$estado' ORDER BY sigla), 
                  '$cep', '$cpf', '$rg','$data_sql', '$naturalidade', '$nacionalidade', 
                  '$email', '$telefone', '$celular', '$trabalho', '$especnome' )";

            $inserir = mysqli_query($this->getBanco(), $query);

            if ($inserir) {

                header("Location: ../View/Adm/Medico.php?valor=1");

            } else {
                $var = mysqli_error($this->getBanco());

                header("Location: ../View/Adm/Medico.php?valor=2&erro=".$var);
            }
    }


    public function InserirPaciente ($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
                                   $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae)
    {
        $this->Construct();

        $data_sql= date("Y-m-d", strtotime($data_nascimento));

        $query = "INSERT INTO paciente (cpf,nome,endereco,bairro,complemento,cidade,estado,cep,rg,
                  data_nascimento,naturalidade,nacionalidade,email,telefone,celular,tipo_sanguineo,nome_pai,nome_mae)
                  VALUES ('$cpf', '$nome', '$endereco', '$bairro', '$complemento',
                  (SELECT nome FROM cidades WHERE cod_cidades = '$cidade' ORDER BY nome),
                  (SELECT nome FROM estados where cod_estados = '$estado' ORDER BY sigla), 
                  '$cep', '$rg','$data_sql', '$naturalidade', '$nacionalidade', 
                  '$email', '$telefone', '$celular', '$tipoSan', '$NomePai', '$NomeMae' )";

        $inserir = mysqli_query($this->getBanco(), $query);


        if ($inserir) {

            header("Location: ../View/Adm/Paciente.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/Paciente.php?valor=2&erro=".$var);
        }
    }


    public function InserirAtend ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
                                  $gravidez, $diabetes, $medicamentos)
    {
        $this->Construct();

        $query = "INSERT INTO atendimento (agendamento_cod_agendamento ,queixa_principal, 
                  historico,problemas_renais,problemas_articulares,
                  problemas_cardiacos,problemas_respiratorios,problemas_gastricos,
                  alergias,hepatite,gravidez,diabetes,utilliza_medicamentos)
                  VALUES ('$id', '$queixa', '$historico', '$proRen', 
                  '$proArt', '$proCard', '$proResp', '$proGast', 
                  '$alergias', '$hepatite', '$gravidez', '$diabetes','$medicamentos' )";

        $inserir = mysqli_query($this->getBanco(), $query);

        if ($inserir) {

            header("Location: ../View/Medico/MedAtend.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Medico/MedAtend.php?valor=2&erro=".$var);
        }
    }

    public function InserirAgenda ($data, $hora, $medico, $paciente)
    {
        $this->Construct();

        $query = "INSERT INTO agendamento (data, hora, medico_crm, paciente_cpf)
                  VALUES ('$data', '$hora', '$medico', '$paciente')";

        $inserir = mysqli_query($this->getBanco(), $query);

        if ($inserir) {

            header("Location: ../View/Adm/Agendamento.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/Agendamento.php?valor=2&erro=".$var);
        }
    }


    public function EditAgenda($id, $data, $hora, $medico, $paciente)
    {
        $this->Construct();

        $query = "UPDATE agendamento 
                  SET data = '$data', hora = '$hora', medico_crm = '$medico', paciente_cpf = '$paciente' 
                  WHERE cod_agendamento = '$id' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Adm/AdmConsultas.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/AdmConsultas.php?valorEdit=2&erro=".$var);
        }

    }

    function Delete($id)
    {
        $this->Construct();

        $query = "DELETE FROM agendamento WHERE cod_agendamento = '$id'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Adm/AdmConsultas.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/AdmConsultas.php?valorDel=2&erro=".$var);
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

    public function getQueryEsp()
    {
        return $this->queryEsp;
    }

    public function getResultEdit()
    {
        return $this->resultEdit;
    }

    public function getResultMed()
    {
        return $this->resultMed;
    }

    public function getResultPac()
    {
        return $this->resultPac;
    }

    public function Desconectar()
    {
        mysqli_close($this->getBanco());
    }


}

?>