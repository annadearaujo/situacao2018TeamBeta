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

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/home.css">
	
	</head>
<body>
	<!--Static navbar-->
	        
	          <ul>
	          	<li><span><a href="inscrevase.php">Inscrever-se</a></span></li>
	            <li><span><a href="entrar.php">Entrar</a></span></li>
	            <li class="li-beta"><span class="beta1"><a href="news.php">News</a></span></li>
	            <li><span class="beta2"><a href="quadrinnhos.php">Quadrinhos</a></span></li>
	            <li><span class="beta3"><a href="mangas.php">Manga</a></span></li>
	            <li><span class="beta4"><a href="store.php">Otaku Store</a></span></li>
	          </ul>

	    <div class="">
	    	<br><br><br><br>
	    		<div class="">
	    			store
	    		</div>
	    	
	    </div>
	    

	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>