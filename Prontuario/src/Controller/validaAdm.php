<?php
// Inclui o arquivo com o sistema de segurança
require("../Model/seguranca.php");

    $usuario = (isset($_GET['usuario'])) ? $_GET['usuario'] : '';
    $senha = (isset($_GET['senha'])) ?   $_GET['senha'] : '';
    // Utiliza uma função criada no seguranca.php pra validar os dados digitados
    if (validaUsuario($usuario, $senha) == true) {
        // O usuário e a senha digitados foram validados, manda pra página interna
        header("Location: ../View/Adm/Home.php");
    } else{
        // O usuário e/ou a senha são inválidos, manda de volta pro form de login
        // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
        expulsaVisitante();
    }
