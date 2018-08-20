<?php
	//para utilizar as variáveis de sessão é preciso sempre iniciar a mesma.
	session_start();
	//se o usuário tentar acessar a página sem fazer login, será redirecionado para a página index.php
	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Meu perfil</title>
	<meta charset="UTF-8">
		<title>Twitter clone</title>		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	          	<li><a href="perfil.php">Meu perfil</a></li>
	            <li><a href="home.php">Voltar</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php
					require_once("db.class.php");

					$objDb = new db();
					$link = $objDb -> conecta_mysql();

					$nome = $_SESSION['usuario_nome'];

					$query = "SELECT * FROM `usuario` WHERE nome_usuario='".$nome."'";		

					if($resultado_id = mysqli_query($link, $sql)){

						$dados_usuario = mysqli_fetch_array($resultado_id);
						if(isset($dados_usuario['img_fundo'])){

							echo "foi";
						}
						}else{
							echo 'Erro ao tentar localizar o usuário.';
						}
				?>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

</body>
</html>