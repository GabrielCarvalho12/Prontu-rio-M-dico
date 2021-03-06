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

    case 'EditarMedico':

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

        $ctrl->EditMedico  ($crm, $nome, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $cpf, $rg,
            $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $trabalho, $especialidades);

        break;

    case 'DelMedico':
        $crm = $_GET['crm'];

        $ctrl->DelMedico($crm);

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

    case 'EditarPaciente':

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

        $ctrl->EditPaciente($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
            $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae);

        break;

    case 'DelPaciente':
        $cpf = $_GET['cpf'];

        $ctrl->DelPaciente($cpf);

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

    case 'EditarAtend':

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

        $ctrl->EditAtend  ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
            $gravidez, $diabetes, $medicamentos);
        break;

    case 'DelAtend':
        $id = $_GET['id'];

        $ctrl->DelAtend($id);

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

        $ctrl->DelAgenda($id);

        break;

    case 'EditarAgendaMed':

        $id = $_GET['id'];
        $data = $_GET['dataAtend'];
        $hora = $_GET['horaAtend'];
        $medico = $_GET['medico'];
        $paciente = $_GET['paciente'];

        $ctrl->EditAgendaMed($id, $data, $hora, $medico, $paciente);

        break;

    case 'DelAgendaMed':
        $id = $_GET['id'];

        $ctrl->DelAgendaMed($id);

        break;

    case 'InserirAtendMed':

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

        $ctrl->InserirAtendMed  ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
            $gravidez, $diabetes, $medicamentos);

        break;

        case 'EditarAtendMed':

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

        $ctrl->EditAtendMed  ($id, $queixa, $historico, $proRen, $proArt, $proCard, $proGast, $proResp, $alergias, $hepatite,
            $gravidez, $diabetes, $medicamentos);
        break;

    case 'DelAtendMed':
        $id = $_GET['id'];

        $ctrl->DelAtendMed($id);

        break;

    case 'InserirPacienteAtend':

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

        $ctrl->InserirPacienteAtend  ($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
            $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae);

        break;

    case 'EditarPacienteAtend':

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

        $ctrl->EditPacienteAtend($cpf, $nome, $endereco, $bairro, $complemento, $cidade, $estado, $cep, $rg,
            $data_nascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $tipoSan, $NomePai, $NomeMae);

        break;

    case 'DelPacienteAtend':
        $cpf = $_GET['cpf'];

        $ctrl->DelPacienteAtend($cpf);

        break;

    case 'InserirAgendaAtend':


        $data = $_GET['dataAtend'];
        $hora = $_GET['horaAtend'];
        $medico = $_GET['medico'];
        $paciente = $_GET['paciente'];


        $ctrl->InserirAgendaAtend ($data, $hora, $medico, $paciente);

        break;

    case 'EditarAgendaAtend':

        $id = $_GET['id'];
        $data = $_GET['dataAtend'];
        $hora = $_GET['horaAtend'];
        $medico = $_GET['medico'];
        $paciente = $_GET['paciente'];

        $ctrl->EditAgendaAtend($id, $data, $hora, $medico, $paciente);

        break;


    case 'DelAgendaAtend':
        $id = $_GET['id'];

        $ctrl->DelAgendaAtend($id);

        break;

    default:
        //no action sent
}

?>
