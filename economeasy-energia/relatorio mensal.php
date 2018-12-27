<?php
	/* Realiza a conexão com o banco de dados */
	$servername = "localhost";
	$username = "registro";
	$password = "";
	$dbname = "sitemensurargastosenergia";
	$tabelalogin = "usuario"; 
	$conexao = mysqli_connect($servername,$username,$password,$dbname)or die('Erro ao conectar ao banco de dados');	
?>
<?php
	/* Inicia a sessão com o login e a senha se estiverem corretos, senão volta para a pagina inicial */
	session_start();
	if(!isset($_SESSION['email']) || !isset($_SESSION['senha']))	{
		header("Location:index.html");
																	}
		else{
			/* Realiza a conexão com o banco de dados */
			$servername = "localhost";
			$username = "registro";
			$password = "";
			$dbname = "sitemensurargastosenergia";
			$tabelalogin = "usuario";
			/* Pega o email e a senha do usuário */
			$email = $_SESSION['email'];
			$senha = $_SESSION['senha'];
			$conexao = mysqli_connect($servername,$username,$password,$dbname)or die('Erro ao conectar ao banco de dados');
			/* valida o usuário e a senha procurando no banco */
			$valida = "SELECT * FROM `usuario` where Email = '$email' AND Senha = '$senha';";
			$get = mysqli_query($conexao,$valida) or die(mysqli_error($conexao));
					/* Conta o número de linhas e armazena em uma variável */
					$num = mysqli_num_rows($get);
					/* Se o número de linhas for igual a 1 seleciona todas as linhas que contém a ID do usuário e coloca em uma sessão para mostrar para o 
					usuário */
						if($num==1)	{
							/* pega as colunas da tabela usuario e adiciona em um vetor */
							$linha = mysqli_fetch_array($get);	
							/* Define uma variavel com o valor do vetor do ID do usuário */
							$idusuario = $linha['IdUsuario'];
							/* Seleciona na tabela consumo onde tem linhas com o ID do usuário */
							$buscaconsumo = "SELECT * FROM `consumo` where IdUsuario='$idusuario'";
							$queryconsumo =	mysqli_query($conexao,$buscaconsumo);
							/* pega as colunas da tabela consumo e adiciona em um vetor */
							$linhaconsumo = mysqli_fetch_array($queryconsumo);
							$consumousuario = $linhaconsumo['consumo_usuario'];
							$dataconsumo = $linhaconsumo['mes'];
							$_SESSION['consumousuario'] = $linhaconsumo['consumo_usuario'];
							$_SESSION['data'] = $linhaconsumo['mes'];
							
							/* Inclui a página html no PHP */		
							include('relatorio mensal.html');
									}
			
			
			}			

?>