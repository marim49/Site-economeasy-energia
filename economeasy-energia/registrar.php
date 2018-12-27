<?php

	/* Pega o nome, senha e o email digitados no registro e armazena em variáveis */
	$nome = $_POST['inserirnome'];
	$senha = $_POST['inserirsenha'];
	$email = $_POST ['inseriremail'];
	/* Realiza a conexão com o banco de dados */
	$servername = "localhost";
	$username = "registro";
	$password = "";
	$dbname = "sitemensurargastosenergia";
			$conexao = mysqli_connect($servername,$username,$password,$dbname)or die('Erro ao conectar ao banco de dados');
			/* Insere os valores na tabela usuario para realizar o cadastro do usuário */
			$query = "INSERT INTO usuario (nome, senha, email) VALUES ('$nome','$senha', '$email')"; 
			/* Executa a ação,  se não executar é porque o email já foi cadastrado */
			mysqli_query($conexao,$query) or die ("<script language='javascript' type='text/javascript'> alert('Ja existe este email cadastrado!!'); window.location.href='index.html';</script>");
			/* Fecha a conexão com o banco */
			mysqli_close($conexao);
			/* Inicia a sessão e direciona para a pagina de login */
			session_start();
							$_SESSION['email'] = $_POST['inseriremail'];
							$_SESSION['senha'] = $_POST['inserirsenha'];
							header("Location:index.html");
			

?>