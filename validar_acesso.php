<!--Implementando o recurso de sessão.-->

<?php 
	//indica para o script que ele terá acesso às funções de sessão. Deve ser inserido no começo do código
	session_start();

	//importa php de conexão com o banco
	require_once ('db.class.php');
	$usuario = $_POST['usuario'];
	//criptografando a senha
	$senha = md5($_POST['senha']);
	$_SESSION['senha'] = $senha;

	$sql = "SELECT * FROM usuario WHERE nome_usuario='$usuario' AND senha='$senha'";

	//cria uma nova instância da classe
	$objDb = new db();
	//salva o link retornado na variável link
	$link = $objDb -> conecta_mysql();

	//Ao realizar um SQL, o mysqli retorna um resource que precisa ser armazenado e convertido pela função mysqli_fetch_array()
	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		//verifica se é usuario adm ou normal
		if($dados_usuario['id_tipo_usuario'] == '1'){

				//leva o usuario a pagina home	
				if(isset($dados_usuario['nome_usuario'])){
					
					$_SESSION['id_usuario']=$dados_usuario['id'];
					$_SESSION['usuario_nome']=$dados_usuario['nome_usuario'];
					$_SESSION['email']=$dados_usuario['email'];
					$_SESSION['usuario']=$dados_usuario['nome_usuario'];
					//Caso os dados inseridos pelo usuário estejam corretos ele será redirecionado para a página de home.

					header('Location: home.php');
				}else{
					header('Location: home.php');
				}


		}else{
			
				$_SESSION['id_usuario']=$dados_usuario['id'];
				$_SESSION['usuario']=$dados_usuario['nome_usuario'];
				$_SESSION['email']=$dados_usuario['email'];
				$_SESSION['id_tipo_usuario']=$dados_usuario['id_tipo_usuario'];
				
				header('Location: home_adm.php');
		}

	}else{
		echo 'erro na execução da consulta.';
	}	

 ?>