<?php 
	session_start();
	/*função unset elimina a sessão informada como parâmetro.*/
	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	header('Location: index.php');
 ?>