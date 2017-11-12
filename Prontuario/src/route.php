<?php
//Rotas
$route = $urlAmigavel->routes(

		//*******************
		//Array Rota
		[

            [
                //Rota
                'prefix' => '/',
                //nomeDoArquivo
                'archive'    => 'inicio.php'
            ],

            [
                //Rota
                'prefix' => '/login',
                //nomeDoArquivo
                'archive'    => '/logins/Login.php'
            ],

            [
                //Rota
                'prefix' => '/loginMedico',
                //nomeDoArquivo
                'archive'    => '/logins/loginMedico.php'
            ],

            [
                //Rota
                'prefix' => '/loginAtend',
                //nomeDoArquivo
                'archive'    => '/logins/loginAtend.php'
            ],

		]
		//And Array Rotas
		//*******************
	
	);