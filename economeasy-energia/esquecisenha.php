<?php 
	/* Define valores as variáveis digitadas no esqueceu a senha */
	$senha = $_POST['inserirsenha'];
	$email = $_POST ['logaremail'];
	$entrar = $_POST['entrar'];
	/* Realiza a conexão com o banco de dados */
	$servername = "localhost";
	$username = "registro";
	$password = "";
	$dbname = "sitemensurargastosenergia";
	$tabelalogin = "usuario"; 
	$conexao = mysqli_connect($servername,$username,$password,$dbname)or die('Erro ao conectar ao banco de dados');
				/* Se o usuário tiver digitado o email */
				if(isset($_POST['logaremail'])){
					$email = $_POST['logaremail'];
					$senha = $_POST['inserirsenha'];
					/* Seleciona na tabela usuário no banco onde o email for o mesmo do digitado */
					$valida = "SELECT * FROM `usuario` where Email = '$email';";
					$get = mysqli_query($conexao,$valida) or die(mysqli_error($conexao));
					$nome = mysqli_fetch_array($get);
					/* Verifica se foi selecionado somente 1 usuário */
					$num = mysqli_num_rows($get);
						if($num==1)	{
							/* seleciona na tabela usuário o email correspondente e troca a senha do usuário */
							$alterasenha = "UPDATE `usuario` set Senha = '$senha' where Email = '$email';";
							$atualizar = mysqli_query($conexao,$alterasenha) or die (mysqli_error($conexao));
							/* Mostra para o usuário que a senha foi alterada */
							echo "<script language='javascript' type='text/javascript'> alert('Senha alterada com sucesso!'); window.location.href='index.html';</script>";
							
											}
							else{
								/* Não foi encontrado o email ou existe mais de um email com o mesmo nome cadastrado */
								echo "<script language='javascript' type='text/javascript'> alert('Login e/ou senha incorretos'); window.location.href='index.html';</script>";
								die();
								}
							
		
																			}
					
					
				
				
								


?>