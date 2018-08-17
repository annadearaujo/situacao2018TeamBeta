<?php  
	session_start();

	$titulo = $_SESSION['titulo_p'];
	$texto = $_SESSION['texto_p'];
	$id_postagem = $_SESSION['id'];


?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>

<body>

		<!-- Static navbar -->
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

	    	<div class="col-md-2"></div>
	    	
	    	<!-- DIV PARA editar -->
	    	<div class="col-md-8">
	    		<div class="panel panel-default">
	    			<div class="panel-body">

	    				<form method="POST" action="edita.php">
	    						<label>Titulo:</label>
	    						<input type="text" name="titulo_post_n" value="<?php echo $titulo; ?>" class="form-control"><br><br>
	    						<label>Texto:</label>
	    						<input type="text" name="texto_post_n" value="<?php echo $texto; ?>" class="form-control"><br><br>


	    					<button type="submit" class="btn btn-primary form-control">Editar</button>
	    					

	    				</form>

	    			</div>
	    		</div>

			</div>

			<div class="col-md-2"></div>

		</div>

	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>