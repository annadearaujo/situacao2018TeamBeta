<?php 
	session_start();
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
	            <li><a href="index.php">Voltar</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	<div class="container">
		
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="validar_acesso.php" method="POST">
					<div class="form-group">
						<label>Nome: </label><br><br>
						<input type="text" name="usuario" id="usuario" class="form-control"><br>
					</div>
					<div class="form-group">
						<label>Senha: </label><br><br>
						<input type="text" name="senha" id="senha" class="form-control"><br>
					</div>
					<button type="submit" class="btn btn-primary form-control">Entrar</button>
					<?php  
					$senha=$_SESSION['senha'] ;
					echo$senha;
					?>
				</form>
 			</div>
			<div class="col-md-4"></div>
		</div>

	</div>

</body>
</html>