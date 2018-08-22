<?php 
	//guarda na variável $erro o que está na url da página. Caso não tenha nada, guarda o valor 0.
	$erro = isset($_GET['erro']) ? $_GET['erro']:0;	
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<!--link css da pagina-->
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<!--link css da barra de navegação-->
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
	
	</head>
<body>

	<!--Barra de navegação. Padrão para todas as abas-->
	<ul class="ul_navbar">
	    <li><span><a href="#" class="link_nav">inscrever-se</a></span></li>
	    <li><span><a href="#" class="link_nav">Entrar</a></span></li>
	    <li><span><a href="#" class="link_nav">News</a></span></li>
	    <li><span><a href="#" class="link_nav">Quadrinhos</a></span></li>
	    <li><span><a href="#" class="link_nav">Manga</a></span></li>
	    <li><span><a href="#" class="link_nav">Otaku Store</a></span></li>
	</ul>   

	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>