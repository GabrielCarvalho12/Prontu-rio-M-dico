<?php


class Conexao
{
    private $servidor;
    private $usuario;
    private $senha;
    private $nomeBanco;
    private $banco;
    private $result;
    private $cidades;
    private $resultMed;
    private $resultEditMed;
    private $resultEditPac;
    private $resultEditAtend;
    private $resultPac;
    private $queryEsp;
    private $Espec;
    private $NomePac;


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

    public function SelectAtend()
    {
        $this->Construct();

        $query = "Select *, agendamento_cod_agendamento as id From atendimento";

        $this->result = mysqli_query($this->getBanco(),$query);

    }

    public function SelectEditMed($crm)
    {
        $this->Construct();

        $query = "Select *
                  From medico 
                  WHERE crm = $crm ";

        $this->resultEditMed = mysqli_query($this->getBanco(),$query);

    }

    public function SelectEditAtend($id)
    {
        $this->Construct();

        $query = "Select *
                  From atendimento 
                  WHERE agendamento_cod_agendamento = $id ";

        $this->resultEditAtend = mysqli_query($this->getBanco(),$query);

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

    public function SelectEditPac($cpf)
    {
        $this->Construct();

        $query = "Select *
                  From paciente 
                  WHERE cpf = '$cpf' ";

        $this->resultEditPac = mysqli_query($this->getBanco(),$query);

    }

    public function SelectEstado()
    {
        $this->Construct();

        $query = "SELECT * FROM estados ORDER BY sigla";

        $this->result = mysqli_query($this->getBanco(),$query);

    }

    public function SelectCidade($id)
    {
        $this->Construct();

        $sql = "SELECT * FROM cidades WHERE estados_cod_estados = '$id' ORDER BY nome";

        $res = mysqli_query($this->getBanco(), $sql );

        while ( $row = mysqli_fetch_assoc( $res ) ) {
            $nome = $row["nome"];
            $cid = $row["cod_cidades"];
            echo '<option value="'.$cid.'" class="cidades">'.utf8_encode($nome).'</option>';
        }

    }

    public function SelectEpec()
    {
        $this->Construct();

        $query = "SELECT id, nome FROM especialidades ORDER BY nome";

        $this->queryEsp = mysqli_query($this->getBanco(),$query);

    }

    public  function especialidades($crm)
    {
        $this->Construct();

        $query = "SELECT especialidades FROM medico WHERE crm = $crm";

        $con = mysqli_query($this->getBanco(),$query);

        while ( $row = mysqli_fetch_assoc( $con ) ) {
            $this->Espec = $row["especialidades"];

        }
    }

    public  function  SelectMedPac()
    {
        $this->Construct();

        $queryPac = "SELECT cpf, nome, rg FROM paciente ORDER BY nome";

        $queryMed = "SELECT crm, nome, cpf FROM medico ORDER BY nome";

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

    public function EditMedico ($crm,$nome, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $cpf, $rg,
                                $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $trabalho, $especialidades=[])
    {
        $this->Construct();

        $this->especialidades($crm);
        $especBD = explode(',', $this->Espec);

        $dif = array_diff( $especialidades,$especBD );
        $concat = array_merge($especBD, $dif);
        $result = implode($concat, ",");

        $data_sql= date("Y-m-d", strtotime($data_nascimento));


        $query = "UPDATE medico 
                  SET nome = '$nome',endereco = '$endereco', complemento = '$complemento', bairro = '$bairro', 
                  cidade = (SELECT nome FROM cidades WHERE cod_cidades = '$cidade' ORDER BY nome), 
                  estado = (SELECT nome FROM estados where cod_estados = '$estado' ORDER BY sigla), 
                  cep = '$cep', cpf = '$cpf', rg = '$rg',
                  data_nascimento = '$data_sql', naturalidade = '$naturalidade', nacionalidade = '$nacionalidade', email = '$email', 
                  telefone = '$telefone',celular = '$celular', trabalho = '$trabalho', especialidades = '$result'  
                  WHERE crm = '$crm' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Adm/ExibeMedico.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeMedico.php?valorEdit=2&erro=".$var);
        }

    }

    function DelMedico($crm)
    {
        $this->Construct();

        $query = "DELETE FROM medico WHERE crm = '$crm'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Adm/ExibeMedico.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeMedico.php?valorDel=2&erro=".$var);
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

    public function EditPaciente ($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
                                  $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae)
    {
        $this->Construct();

        $data_sql= date("Y-m-d", strtotime($data_nascimento));

        $query = "UPDATE paciente 
                  SET nome = '$nome',endereco = '$endereco', complemento = '$complemento', bairro = '$bairro', 
                  cidade = (SELECT nome FROM cidades WHERE cod_cidades = '$cidade' ORDER BY nome), 
                  estado = (SELECT nome FROM estados where cod_estados = '$estado' ORDER BY sigla), 
                  cep = '$cep', cpf = '$cpf', rg = '$rg',
                  data_nascimento = '$data_sql', naturalidade = '$naturalidade', nacionalidade = '$nacionalidade', email = '$email', telefone = '$telefone',celular = '$celular', 
                  tipo_sanguineo = '$tipoSan', nome_pai = '$NomePai', nome_mae = '$NomeMae'
                  WHERE cpf = '$cpf' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Adm/ExibePaciente.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibePaciente.php?valorEdit=2&erro=".$var);
        }

    }

    function DelPaciente($cpf)
    {
        $this->Construct();

        $query = "DELETE FROM paciente WHERE cpf = '$cpf'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Adm/ExibePaciente.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibePaciente.php?valorDel=2&erro=".$var);
        }
    }

    public function InserirAtend ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
                                  $gravidez, $diabetes, $medicamentos)
    {
        $this->Construct();

        $query = "INSERT INTO atendimento (agendamento_cod_agendamento ,queixa_principal, 
                  historico,problemas_renais,problemas_articulares,
                  problemas_cardiacos,problemas_respiratorios,problemas_gastricos,
                  alergias,hepatite,gravidez,diabetes,utiliza_medicamentos)
                  VALUES ('$id', '$queixa', '$historico', '$proRen', 
                  '$proArt', '$proCard', '$proResp', '$proGast', 
                  '$alergias', '$hepatite', '$gravidez', '$diabetes','$medicamentos' )";

        $inserir = mysqli_query($this->getBanco(), $query);

        if ($inserir) {

            header("Location: ../View/Adm/ExibeAtend.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeAtend.php?valor=2&erro=".$var);
        }
    }

    public function EditAtend ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
                               $gravidez, $diabetes, $medicamentos)
    {
        $this->Construct();

        $query = "UPDATE atendimento 
                  SET queixa_principal = '$queixa', historico = '$historico', problemas_renais = '$proRen', problemas_articulares = '$proArt',
                  problemas_cardiacos = '$proCard', problemas_respiratorios = '$proGast', problemas_gastricos = '$proResp',
                  alergias = '$alergias', hepatite = '$hepatite', gravidez = '$gravidez', diabetes = '$diabetes', utiliza_medicamentos = '$medicamentos'
                  WHERE agendamento_cod_agendamento = '$id' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Adm/ExibeAtend.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeAtend.php?valorEdit=2&erro=".$var);
        }

    }

    function DelAtend($id)
    {
        $this->Construct();

        $query = "DELETE FROM atendimento WHERE agendamento_cod_agendamento = '$id'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Adm/ExibeAtend.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeAtend.php?valorDel=2&erro=".$var);
        }
    }

    public function InserirAgenda ($data, $hora, $medico, $paciente)
    {
        $this->Construct();

        $query = "INSERT INTO agendamento (data, hora, medico_crm, paciente_cpf)
                  VALUES ('$data', '$hora', '$medico', '$paciente')";

        $inserir = mysqli_query($this->getBanco(), $query);

        if ($inserir) {

            header("Location: ../View/Adm/ExibeAgend.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeAgend.php?valor=2&erro=".$var);
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

            header("Location: ../View/Adm/ExibeAgend.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeAgend.php?valorEdit=2&erro=".$var);
        }

    }

    function DelAgenda($id)
    {
        $this->Construct();

        $query = "DELETE FROM agendamento WHERE cod_agendamento = '$id'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Adm/ExibeAgend.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Adm/ExibeAgend.php?valorDel=2&erro=".$var);
        }
    }


    public function EditAgendaMed($id, $data, $hora, $medico, $paciente)
    {
        $this->Construct();

        $query = "UPDATE agendamento 
                  SET data = '$data', hora = '$hora', medico_crm = '$medico', paciente_cpf = '$paciente' 
                  WHERE cod_agendamento = '$id' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Medico/ExibeAgendMed.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Medico/ExibeAgendMed.php?valorEdit=2&erro=".$var);
        }

    }

    function DelAgendaMed($id)
    {
        $this->Construct();

        $query = "DELETE FROM agendamento WHERE cod_agendamento = '$id'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Medico/ExibeAgendMed.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Medico/ExibeAgendMed.php?valorDel=2&erro=".$var);
        }
    }

    public function InserirAtendMed ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
                                  $gravidez, $diabetes, $medicamentos)
    {
        $this->Construct();

        $query = "INSERT INTO atendimento (agendamento_cod_agendamento ,queixa_principal, 
                  historico,problemas_renais,problemas_articulares,
                  problemas_cardiacos,problemas_respiratorios,problemas_gastricos,
                  alergias,hepatite,gravidez,diabetes,utiliza_medicamentos)
                  VALUES ('$id', '$queixa', '$historico', '$proRen', 
                  '$proArt', '$proCard', '$proResp', '$proGast', 
                  '$alergias', '$hepatite', '$gravidez', '$diabetes','$medicamentos' )";

        $inserir = mysqli_query($this->getBanco(), $query);

        if ($inserir) {

            header("Location: ../View/Medico/ExibeAtendMed.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Medico/ExibeAtendMed.php?valor=2&erro=".$var);
        }
    }

    public function EditAtendMed($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
                                 $gravidez, $diabetes, $medicamentos)
    {
        $this->Construct();

        $query = "UPDATE atendimento 
                  SET queixa_principal = '$queixa', historico = '$historico', problemas_renais = '$proRen', problemas_articulares = '$proArt',
                  problemas_cardiacos = '$proCard', problemas_respiratorios = '$proGast', problemas_gastricos = '$proResp',
                  alergias = '$alergias', hepatite = '$hepatite', gravidez = '$gravidez', diabetes = '$diabetes', utiliza_medicamentos = '$medicamentos'
                  WHERE agendamento_cod_agendamento = '$id' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Medico/ExibeAtendMed.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Medico/ExibeAtendMed.php?valorEdit=2&erro=".$var);
        }

    }

    function DelAtendMed($id)
    {
        $this->Construct();

        $query = "DELETE FROM atendimento WHERE agendamento_cod_agendamento = '$id'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Medico/ExibeAtendMed.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Medico/ExibeAtendMed.php?valorDel=2&erro=".$var);
        }
    }

    public function InserirPacienteAtend ($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
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

            header("Location: ../View/Atend/ExibePacAtend.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Atend/ExibePacAtend.php?valor=2&erro=".$var);
        }
    }

    public function EditPacienteAtend ($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
                                  $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae)
    {
        $this->Construct();

        $data_sql= date("Y-m-d", strtotime($data_nascimento));

        $query = "UPDATE paciente 
                  SET nome = '$nome',endereco = '$endereco', complemento = '$complemento', bairro = '$bairro', 
                  cidade = (SELECT nome FROM cidades WHERE cod_cidades = '$cidade' ORDER BY nome), 
                  estado = (SELECT nome FROM estados where cod_estados = '$estado' ORDER BY sigla), 
                  cep = '$cep', cpf = '$cpf', rg = '$rg',
                  data_nascimento = '$data_sql', naturalidade = '$naturalidade', nacionalidade = '$nacionalidade', email = '$email', telefone = '$telefone',celular = '$celular', 
                  tipo_sanguineo = '$tipoSan', nome_pai = '$NomePai', nome_mae = '$NomeMae'
                  WHERE cpf = '$cpf' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Atend/ExibePacAtend.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Atend/ExibePacAtend.php?valorEdit=2&erro=".$var);
        }

    }

    function DelPacienteAtend($cpf)
    {
        $this->Construct();

        $query = "DELETE FROM paciente WHERE cpf = '$cpf'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Atend/ExibePacAtend.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Atend/ExibePacAtend.php?valorDel=2&erro=".$var);
        }
    }

    public function InserirAgendaAtend ($data, $hora, $medico, $paciente)
    {
        $this->Construct();

        $query = "INSERT INTO agendamento (data, hora, medico_crm, paciente_cpf)
                  VALUES ('$data', '$hora', '$medico', '$paciente')";

        $inserir = mysqli_query($this->getBanco(), $query);

        if ($inserir) {

            header("Location: ../View/Atend/ExibeAgendAtend.php?valor=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Atend/ExibeAgendAtend.php?valor=2&erro=".$var);
        }
    }


    public function EditAgendaAtend($id, $data, $hora, $medico, $paciente)
    {
        $this->Construct();

        $query = "UPDATE agendamento 
                  SET data = '$data', hora = '$hora', medico_crm = '$medico', paciente_cpf = '$paciente' 
                  WHERE cod_agendamento = '$id' ";

        $atualizar = mysqli_query($this->getBanco(),$query);

        if ($atualizar) {

            header("Location: ../View/Atend/ExibeAgendAtend.php?valorEdit=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Atend/ExibeAgendAtend.php?valorEdit=2&erro=".$var);
        }

    }

    function DelAgendaAtend($id)
    {
        $this->Construct();

        $query = "DELETE FROM agendamento WHERE cod_agendamento = '$id'";
        $deletar=mysqli_query($this->getBanco(),$query);

        if ($deletar) {

            header("Location: ../View/Atend/ExibeAgendAtend.php?valorDel=1");

        } else {
            $var = mysqli_error($this->getBanco());

            header("Location: ../View/Atend/ExibeAgendAtend.php?valorDel=2&erro=".$var);
        }
    }

    public function SelectTimeLine($cpf)
    {
        $this->Construct();

        $query = "Select paciente.nome as nome, atendimento.queixa_principal as queixa, atendimento.historico as historico, 
                  CAST(dataHora AS TIME) as hora, CAST(dataHora AS DATE) as data
                  From atendimento
                  inner join agendamento on atendimento.agendamento_cod_agendamento = agendamento.cod_agendamento 
                  inner join paciente on paciente.cpf = agendamento.paciente_cpf
                  where agendamento.paciente_cpf = '$cpf'";

        $nome = $this->result = mysqli_query($this->getBanco(),$query);

        while ( $row = mysqli_fetch_assoc( $nome ) ) {
            $this->NomePac = $row["nome"];

        }

        $this->result = mysqli_query($this->getBanco(),$query);

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

    public function getResultEditAtend()
    {
        return $this->resultEditAtend;
    }

    public function getResultEditMed()
    {
        return $this->resultEditMed;
    }

    public function getResultEditPac()
    {
        return $this->resultEditPac;
    }

    public function getResultMed()
    {
        return $this->resultMed;
    }

    public function getCidades()
    {
        return $this->cidades;
    }

    public function getResultPac()
    {
        return $this->resultPac;
    }

    public function getNomePac()
    {
        return $this->NomePac;
    }

    public function Desconectar()
    {
        mysqli_close($this->getBanco());
    }


}

?>