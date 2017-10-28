<?php
//Rotas
$route = $urlAmigavel->routes(

		//*******************
		//Array Rota
		[

            [
                //Rota
                'prefix' => '/login',
                //nomeDoArquivo
                'archive'    => 'Login.php'
            ],

            [
                //Rota
                'prefix' => '/loginMedico',
                //nomeDoArquivo
                'archive'    => 'loginMedico.php'
            ],

            [
                //Rota
                'prefix' => '/loginAtend',
                //nomeDoArquivo
                'archive'    => 'loginAtend.php'
            ]

		]
		//And Array Rotas
		//*******************
	
	);