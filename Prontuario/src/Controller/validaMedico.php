<?php
// Inclui o arquivo com o sistema de segurança
require("../Model/seguranca.php");
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
    $usuario = (isset($_GET['usuario'])) ? $_GET['usuario'] : '';
    $senha = (isset($_GET['senha'])) ?   $_GET['senha'] : '';
    // Utiliza uma função criada no seguranca.php pra validar os dados digitados
    if (validaMedico($usuario, $senha) == true) {
        // O usuário e a senha digitados foram validados, manda pra página interna
        header("Location: ../View/Home.php");
    } else{
        // O usuário e/ou a senha são inválidos, manda de volta pro form de login
        // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
        expulsaVisitanteMed();
    }
}