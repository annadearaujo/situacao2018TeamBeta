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
							url: 'inclui_tweet.php',
							method: 'post',
							//chave:valor
							/*utilizar a função serialize() converte tudo que estiver em um form em um data do tipo chave: valor, tornando o processo de envio de um form via ajax mais rápido e fácil. É preciso atribuir um name para cada botão cujos dados deseja enviar.*/
							data: $('#form_tweet').serialize(),
							success: function(data){
								//caso os dados sejam enviados com sucesso, limpar o campo de tweet.
								$('#texto_tweet').val('');
								atualizaTweet();
							}
						});
					}
				});

				//função para atualizar os tweets na timeline
				function atualizaTweet(){
					$.ajax({
						url: 'get_tweet.php', success: function(data){
							$('#tweets').html(data);
						}
					});
				}

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
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	    	<div class="col-md-3	">
	    		<div class="panel panel-default">
					<div class="panel-body">
						<h4>Postagens mais recentes</h4>
					</div>
				</div>
	    		<!-- DIV PARA A INSERÇÃO das postagens -->
	    		<div id="tweets" class="list-group">
	    			
	    		</div>
			</div>

			<div class="col-md-3">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h4><a href="editar_postagems.php">Editar postagem</a></h4>
	    			</div>
	    		</div>
			</div>

			<div class="col-md-3">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h4><a href="criar_postagens.php">Criar nova postagem</a></h4>
	    			</div>
	    		</div>
			</div>

			<div class="col-md-3">
				<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h4><a href="excluir.php">Excluir post</a></h4>
	    			</div>
	    		</div>
			</div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>