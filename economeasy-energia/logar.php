<?php 
	/* Define valores as variáveis digitadas no login */
	$senha = $_POST['logarsenha'];
	$email = $_POST ['logaremail'];
	$entrar = $_POST['entrar'];
	/* Realiza a conexão com o banco de dados */
	$servername = "localhost";
	$username = "registro";
	$password = "";
	$dbname = "sitemensurargastosenergia";
	$tabelalogin = "usuario"; 
	$conexao = mysqli_connect($servername,$username,$password,$dbname)or die('Erro ao conectar ao banco de dados');
				/* Inicia a sessão com os dados do usuário se o email e a senha estiverem corretos  se não, volta para a página inicial*/
				if(isset($_POST['logaremail'])&&isset($_POST['logarsenha'])){
					$email = $_POST['logaremail'];
					$senha = $_POST['logarsenha'];
					/* Seleciona na tabela usuario do banco onde o usuário e a senha são iguais as variáveis */
					$valida = "SELECT * FROM `usuario` where Email = '$email' AND Senha = '$senha';";
					/* Executa a ação */
					$get = mysqli_query($conexao,$valida) or die(mysqli_error($conexao));
					/* pega as colunas da tabela usuario e adiciona em um vetor */
					$nome = mysqli_fetch_array($get);
					$num = mysqli_num_rows($get);
					/* Verifica se foi selecionado somente 1 usuário */
						if($num==1)	{
							/* Inicia a sessão */
							session_start();
							$_SESSION['email'] = $_POST['logaremail'];
							$_SESSION['senha'] = $_POST['logarsenha'];
							$_SESSION['nome'] = $nome["Nome"];
							
							/* Direciona a página home */
							header("Location:home.php");
											}
							else{
								/* Mostra que não conseguiu achar os valores digitados no banco */
								echo "<script language='javascript' type='text/javascript'> alert('Login e/ou senha incorretos'); window.location.href='index.html';</script>";
								die();
								}
							
		
																			}
					
					
				
				
								


?>