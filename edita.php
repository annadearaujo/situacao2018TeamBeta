<?php  
	session_start();

	$id_postagem = $_SESSION['id'];
	$texto_modificado = $_POST['texto_post_n'];
	$titulo_modificado = $_POST['titulo_post_n'];

	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb -> conecta_mysql();

	$sql = "UPDATE `postagens` SET `titulo`='".$titulo_modificado."',`texto`='".$texto_modificado."' WHERE id_postagens='".$id_postagem."'";

	$resultado_id = mysqli_query($link, $sql);

	if ($resultado_id) {
		header('Location: editar_postagems.php');
	}else{
		echo "Nao foi possivel editar <a href='editar_postagems.php'>Voltar para a pagina de edição</a>";
	}
?>