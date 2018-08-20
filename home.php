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

		<title>Beta comics</title>

		<link rel="stylesheet" type="text/css" href="css/home.css">
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->

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
	   
	          <ul>
	          	<li class="li_beta1"><span><a href="perfil.php">Meu perfil</a></span></li>
	            <li><span><a href="sair.php">Sair</a></span></li>
	            <li class="li-beta"><span class="beta1"><a href="#">News</a></span></li>
	            <li><span class="beta2"><a href="#">Quadrinhos</a></span></li>
	            <li><span class="beta3"><a href="#">Manga</a></span></li>
	            <li><span class="beta4"><a href="#">Otaku Store</a></span></li>
	          </ul>
	            
	        
	    <div class="div_1">
	    	
	    		<div class="col-1">
	    			BetaComics<br><br>
	    			<hr>
	    			BetaMangá<br><br>
	    			<hr>
	    			BetaStore<br>
	    		</div>
	    		<div class="col-2">
	    			Destaques da semana
	    		</div>
	    		<div class="col-3">
	    			Propagandas
	    		</div>
	    	
	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>