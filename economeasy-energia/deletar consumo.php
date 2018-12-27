
<?php 
	/* Realiza a conexão com o banco de dados */
	$servername = "localhost";
	$username = "registro";
	$password = "";
	$dbname = "sitemensurargastosenergia";
			
			$conexao = mysqli_connect($servername,$username,$password,$dbname)or die('Erro ao conectar ao banco de dados');
			/* Inicia a sessão do usuário */
			session_start();
					/* Pega o email e a senha do usuario */
					$email = $_SESSION['email'];
					$senha = $_SESSION['senha'];
					/* Seleciona no banco o usuário a partir do email e a senha */
					$valida = "SELECT * FROM `usuario` where Email = '$email' AND Senha = '$senha';";
					$get = mysqli_query($conexao,$valida) or die(mysqli_error($conexao));
					/* Verifica se foi selecionado o usuário desejado pegando a linha dele */
					$num = mysqli_num_rows($get);
						/* Se for igual a 1 */
						if($num==1)	{
							/* Pega todo o conteudo da tabela e adiciona a um vetor */
							$linha = mysqli_fetch_array($get);
							/* Defino o vetor que corresponde o vetor do Id do Usuario */
							$idusuario = $linha['IdUsuario'];
							/* Deleta todas linhas que contém o Id do usuário dentro da tabela de consumo */
							$query = "delete from consumo where IdUsuario = '$idusuario'";
							/* Executa a ação, se der erro irá mostrar para o usuário uma mensagem de erro */
							mysqli_query($conexao,$query) or die ("<script language='javascript' type='text/javascript'> alert('erro ao enviar valore para o banco de dados, realize o login novamente!!'); window.location.href='index.html';</script>");
							/* Encerro a conexão com o banco de dados */
							mysqli_close($conexao);
							/* Mostra para o usuário que foi realizada a ação com sucesso */
							echo "<script language='javascript' type='text/javascript'> alert('Historico de consumo apagado com sucesso!!'); window.location.href='home.php';</script>";
									}
							/* Há mais de um usuário com o mesmo ID */
							else { echo "Erro !!"; };
																		
				
				
			
?>