<?php
	/* Inicia uma sessão e a destroy para poder deslogar e volta para a pagina de login */
	session_start();
	session_destroy();
	header("Location:index.html");
?>