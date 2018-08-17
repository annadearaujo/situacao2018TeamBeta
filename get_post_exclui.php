<?php 

	session_start();
	
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php?erro=1');
	}


	$id_usuario = $_SESSION['id_usuario'];
	$titulo = $_POST['texto_tweet'];

	require_once('db.class.php');
	

	$objDb = new db();
	$link = $objDb -> conecta_mysql();
	//LIKE SERVE PARA DIZER QUE SERÁ PESQUISADO QUALQUER COISA DENTRO DO TEXTO QUE CONTENHA OQUE FOI DIGITADO PELO USUÁRIO
	$sql = "SELECT p.* FROM postagens AS p  WHERE p.titulo LIKE '%$titulo%' ";

	$resultado_id = mysqli_query($link, $sql);

	if ($resultado_id) {
		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
			//utilização do recurso do bootstrap de list_group
			echo '<a href="exclui_post.php" class="list-group-item">';
				echo '<strong>'.$registro['titulo'].'</strong> <small> - '.$registro['data_hora'].'</small><br><br>';
				echo '<small>'.$registro['texto'].'</small><br>';
				//pull-right faz um elemento flutuar a direita
				//Inserção de uma classe no botão seguir parapegar o evento de clique
				echo '<p class="list-group-item-text  pull-right">';

				echo'<button type="button" id="btn_edita'.$registro['id_postagens'].'" class="btn btn-primary">Excluir post</button>';
					
				echo '</p>';
				echo '<div class="clearfix"></div>';
				echo '</a>';

				$_SESSION['id'] = $registro['id_postagens']; 
				$_SESSION['titulo_p'] = $registro['titulo'];
				$_SESSION['texto_p'] = $registro['texto'];
		}
	}else{
		echo "Erro ao tentar realizar a consulta";
	}
?>