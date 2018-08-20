<?php
	//para utilizar as variáveis de sessão é preciso sempre iniciar a mesma.
	session_start();
	//se o usuário tentar acessar a página sem fazer login, será redirecionado para a página index.php
	if(!isset($_SESSION['id_tipo_usuario'])){
		header('Location: index.php?erro=1');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Increva-se</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="UTF-8">
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
	            <li><a href="home_adm.php">Voltar</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	<div class="container">
		
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="cadastra.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Titulo do texto: </label><br><br>
						<input type="text" name="titulo_post" id="titulo_post" class="form-control" maxlength="150"><br>
					</div>

					<div class="form-group">
						<label>Texto principas do poste: </label><br><br>
						<input type="text" name="texto_post" id="texto_post" class="form-control" maxlength="350"><br>
					</div>

					<div class="form-group">
						<label>Foto: </label>
						<input type="file" name="foto" id="foto" class="form-control"><br>
					</div>

					<div class="form-group">
						<label>Tipo postagem:</label>
						<select multiple class="form-control" id="tipo_post" name="tipo_post">
							<option value="1">Animes</option>
							<option value="2">Mangas</option>
							<option value="3">HQs</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary form-control">Entrar</button>
				</form>
 			</div>
			<div class="col-md-4"></div>
		</div>

	</div>

</body>
</html>