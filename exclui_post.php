<?php  
	session_start();

	$id_postagem = $_SESSION['id'];

	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb -> conecta_mysql();

	$sql = "DELETE FROM postagens WHERE id_postagens='".$id_postagem."'";

	$resultado_id = mysqli_query($link, $sql);

	if ($resultado_id) {
		header('Location: excluir.php');
		$_SESSION['confirmacao'] = 0;
	}else{
		echo "Nao foi possivel editar <a href='editar_postagems.php'>Voltar para a pagina de edição</a>";
	}
?>