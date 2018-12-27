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
	/* Inicia a sessão do usuário */
	session_start();
	/* Se o usuário e a senha não forem iguais do login, volta para a tela de login */
	if(!isset($_SESSION['email']) || !isset($_SESSION['senha']))	{
		header("Location:index.html");
		/* Senão realiza a operação */															}
		else{
			/* Puxa o nome do tipo de consumo normal */
			$b1normal = ($_POST['b1normal']=='b1normal');
			/* Puxa o nome do tipo de consumo de baixa renda */
            $b1baixarenda = ($_POST['b1normal']=='b1baixarenda');
			/* Puxa a bandeira */
            $bandeira = $_POST['bandeira'];
			/* Puxa a voltagem da casa */
			$voltagem = $_POST['voltagemcasa'];
			/* Puxa a potencia da lâmpada */
			$potencialamp = $_POST['potencialampada'];
			/* Puxa quantidade de lampadas */
			$quantidadelamp = $_POST['quantidadelamp'];
			/* Puxa o chuveiro */
            $chuveiros = $_POST['chuveiros'];
			/* Puxa a potencia do chuveiro */
            (int)$potenciachuv = $_POST['potenciachuveiro'];
			/* Puxa quantidade de chuveiros */
            (int)$quantidadechu = $_POST['quantidadechu'];
			/* Puxa as horas de consumo do chuveiro */
            (int)$horaschuv = $_POST['horaschuv'];
			/* Puxa as horas de consumo da(s) lâmpadas */
			(int)$horaslamp = $_POST['horaslamp'];
			/* variável para armazenar o cálculo do chuveiro */
            $gastochuv;
			/* variável para armazenar o cálculo da(s) lâmpadas */
			$gastolamp;
			/* verificar se a bandeira é normal */
            if($b1normal==true)	{
				if($bandeira=='verde')	{
					$bandeira=49414/100000;
										}
					else if($bandeira=='amarelo')	{
						$bandeira=51414/100000;
													}
						else{
							$bandeira=52414/100000;
							}
								}
            /* calculo mensal chuveiro */
            (int)$gastochuv = ((($potenciachuv*$quantidadechu) * $horaschuv * $bandeira)/1000);
			
			/* calculo mensal lampadas */
			(int)$gastolamp = ((($potencialamp*$quantidadelamp) * $horaschuv * $bandeira)/1000);
			
			$gastototal = $gastolamp + $gastochuv;
			$horasmes = $horaschuv + $horaslamp;
			$totalw = (($potenciachuv*$quantidadechu) + ($potenciachuv*$quantidadelamp))/1000;
			$_SESSION['horasmes'] = $horasmes;
			$_SESSION['totalw'] = $totalw;
			$_SESSION ['gastototal'] = $gastototal;
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
			/* Seleciona no banco de dados o usuário */
			$valida = "SELECT * FROM `usuario` where Email = '$email' AND Senha = '$senha';";
			$get = mysqli_query($conexao,$valida) or die(mysqli_error($conexao));
					/* Verifica se foi selecionado somente 1 usuário */
					$num = mysqli_num_rows($get);
						if($num==1)	{
							$linha = mysqli_fetch_array($get);
							/* Pega o ID do usuário */
							$idusuario = $linha['IdUsuario'];
							/* Insere dentro da tabela consumo no banco os valores calculados */
							$query = "INSERT INTO consumo (IdUsuario,consumo_usuario, mes) VALUES ('$idusuario','$gastototal', CURDATE( ))"; 
							/* Executa a ação */
							mysqli_query($conexao,$query) or die ("<script language='javascript' type='text/javascript'> alert('erro ao enviar valore para o banco de dados, realize o login novamente!!'); window.location.href='index.html';</script>");
							/* Fecha a conexão com o banco de dados */
							mysqli_close($conexao);
									}
			/* Inclui a página html no PHP */
			include('consumo atual.html');
			}			

?>

			
    



			
    
	

