<?php
	//verifica e armazena voa GET o erro ao tentar cadastrar
	$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
	$erro_email = isset($_GET['erro_email']) ?  $_GET['erro_email'] : 0;
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
	
		<script>
			// código javascript						
		</script>
	</head>
<body>
	<!--Static navbar-->
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
	        		<li><a href="index.php">Voltar para a Home</a></li>
	        	</ul>
	        </div>

	      </div>
	    </nav>

	    <div class="container">
	    	<br><br>
	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se.</h3>
	    		<br>
	    		<form method="post" action="registra_usuario.php" id="formCadastrarse">
	    			<div class="form-group">
	    				<input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário" required="required">
	    				<?php
	    				if($erro_usuario){
	    					echo '<font style="color:#FF0000;">Usuário já existe</font>';
	    				}
	    				?>
	    			</div>
	    			<div class="form-group">
	    				<input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
	    				<?php
	    				if($erro_email){
	    					echo '<font style="color:#FF0000;">Email já existe</font>';
	    				}
	    				?>
	    			</div>
	    			<div class="form-group">
	    				<input type="password" name="senha" id="senha" placeholder="Senha" required="required" class="form-control">
	    			</div>
	    			<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
	    			
	    		</form>
	    	</div>
	    	<div class="col-md-4"></div>

	    	<div class="clearfix"></div>
	    	<br/>
	    	<div class="col-md-4"></div>
	    	<div class="col-md-4"></div>
	    	<div class="col-md-4"></div>

	    </div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    
</body>
</html>