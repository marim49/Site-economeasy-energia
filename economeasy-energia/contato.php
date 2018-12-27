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
	/* Inicia a sessão com os dados do usuário se o email e a senha estiverem corretos  se não, volta para a página inicial*/
	session_start();
	if(!isset($_SESSION['email']) || !isset($_SESSION['senha']))	{
		header("Location:index.html");
																	}
		else{
			/* Inclui a página html no PHP */
			include('contato.html');
			}			

?>