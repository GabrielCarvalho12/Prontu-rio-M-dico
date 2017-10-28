<?php
 require_once "../Model/Conexao.php";

$ctrl = new Conexao();

switch ($_GET['enviar']) {
    case 'InserirMedico':

        $especialidades=[];

        $crm = $_GET['crm'];
        $nome = $_GET['nome'];
        $endereco = $_GET['endereco'];
        $complemento = $_GET['complemento'];
        $bairro = $_GET['bairro'];
        $cidade = $_GET['cidade'];
        $estado = $_GET['estado'];
        $cep = $_GET['cep'];
        $cpf = $_GET['cpf'];
        $rg = $_GET['rg'];
        $data_nascimento = $_GET['data_nascimento'];
        $naturalidade = $_GET['naturalidade'];
        $nacionalidade = $_GET['nacionalidade'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        $celular = $_GET['celular'];
        $trabalho = $_GET['trabalho'];
        $especialidades = $_GET['especialidades'];

        $ctrl->InserirMedico  ($crm, $nome, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $cpf, $rg,
        $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $trabalho, $especialidades);

        //require_once "../VIEW/formulario.php";
        break;


    case 'InserirPaciente':

        $cpf = $_GET['cpf'];
        $nome = $_GET['nome'];
        $endereco = $_GET['endereco'];
        $bairro = $_GET['bairro'];
        $complemento = $_GET['complemento'];
        $cidade = $_GET['cidade'];
        $estado = $_GET['estado'];
        $cep = $_GET['cep'];
        $rg = $_GET['rg'];
        $data_nascimento = $_GET['data_nascimento'];
        $naturalidade = $_GET['naturalidade'];
        $nacionalidade = $_GET['nacionalidade'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        $celular = $_GET['celular'];
        $tipoSan = $_GET['tipoSan'];
        $NomePai = $_GET['pai'];
        $NomeMae = $_GET['mae'];

        $ctrl->InserirPaciente  ($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
            $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae);

        break;

    case 'InserirAtend':

        $id = $_GET['id'];
        $queixa = $_GET['queixa'];
        $historico = $_GET['historico'];
        $proRen = $_GET['proRen'];
        $proArt = $_GET['proArt'];
        $proCard = $_GET['proCard'];
        $proGast = $_GET['proGast'];
        $proResp = $_GET['proResp'];
        $alergias = $_GET['alergias'];
        $hepatite = $_GET['hepatite'];
        $gravidez = $_GET['gravidez'];
        $diabetes = $_GET['diabetes'];
        $medicamentos = $_GET['medicamentos'];

        $ctrl->InserirAtend  ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
            $gravidez, $diabetes, $medicamentos);

        break;


    case 'InserirAgenda':


        $data = $_GET['dataAtend'];
        $hora = $_GET['horaAtend'];
        $medico = $_GET['medico'];
        $paciente = $_GET['paciente'];


        $ctrl->InserirAgenda ($data, $hora, $medico, $paciente);

        break;

    case 'EditarAgenda':

        $id = $_GET['id'];
        $data = $_GET['dataAtend'];
        $hora = $_GET['horaAtend'];
        $medico = $_GET['medico'];
        $paciente = $_GET['paciente'];

        $ctrl->EditAgenda($id, $data, $hora, $medico, $paciente);

        break;

    case 'DelAgenda':
        $id = $_GET['id'];

        $ctrl->Delete($id);

        break;


    default:
        //no action sent
}

?>
