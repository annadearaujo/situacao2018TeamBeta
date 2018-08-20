<?php
	//para utilizar as variáveis de sessão é preciso sempre iniciar a mesma.
	session_start();
	//se o usuário tentar acessar a página sem fazer login, será redirecionado para a página index.php
	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}
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

		<script type="text/javascript">
			$(document).ready(function(){
				//associar o evento do click ao botão
				$('#btn_tweet').click(function(){
					
					//Verifica se tem algum valor digitado no campo de tweet.
					if($('#texto_tweet').val().length>0){
						//envia um json via ajax para o arquivo inclui_tweet.php
						$.ajax({
							url: 'get_post_exclui.php',
							method: 'post',
							data: $('#form_tweet').serialize(),

							success: function(data){
								$('#tweets').html(data);
								$('#texto_tweet').val('');
							}

						});
					}
				});

			});

		</script>
		
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

	    	<!--div acima para degitar o nome-->
	    	<div class="col-md-5">

	    		<div class="panel panel-default">
	    			<div class="panel-body">

	    				<form id="form_tweet" class="input-group">

	    					<input type="text" name="texto_tweet" id="texto_tweet" class="form-control" placeholder="Digite o nome do post que deseja excluir" maxlength="140">

	    					<span class="input-group-btn">
	    						<button id="btn_tweet" class="btn btn-default" type="button">Procurar</button>
	    					</span>

	    				</form>

	    			</div>
	    		</div>

	    	</div>
	    	
	    	<!-- DIV PARA A INSERÇÃO DS TWEETS -->
	    	<div class="col-md-5">
	    		<div id="tweets" class="list-group">
	    			
	    		</div>
			</div>

			<div class="col-md-2"></div>

		</div>

	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>