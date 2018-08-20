<?php 
	session_start();
	//importa o código php de conexão com o banco de dados
	require_once('db.class.php');

	/*Armazena os dados preenchidos pelo usuário no formulário da página inscrevase.php*/
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	//criptografando a senha
	$senha = md5($_POST['senha']);

	//cria uma nova instância da classe de conexão
	$objDb = new db();

	//Salva o link retornado pelo método de conexão em uma variável
	$link = $objDb -> conecta_mysql();


	$usuario_existe = false;
	$email_existe = false;

	//verificar se o usuario já existe no banco
	$sql = "SELECT * FROM usuario WHERE nome_usuario = '$usuario'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['usuario'])){
			$usuario_existe = true;
		}
	}else{
		echo 'Erro ao tentar localizar o usuário.';
	}

	//Verifica se o email já existe no banco  
	$sql = "SELECT * FROM usuario WHERE email = '$email'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['email'])){
			$email_existe = true;
		}
	}else{
		echo 'Erro ao tentar localizar o registro de email.';
	}


	if($usuario_existe || $email_existe){
		$retorno_get = '';
		if($usuario_existe){
			$retorno_get.="erro_usuario=1&";
		}
		if($email_existe){
			$retorno_get.="erro_email=1&";
		}

		header('Location: inscrevase.php?'.$retorno_get);
		//fim das verificações
	}else{
		//comandos sql
		$sql = "INSERT INTO `usuario`(`id_tipo_usuario`,`email`, `senha`, `nome_usuario`) VALUES ('1', '".$email."', '".$senha."', '".$usuario."')";

		//executar a query
		if(mysqli_query($link, $sql)){

			$_SESSION['usuario']= $usuario;

			header('Location: home.php');
		}else{
			echo 'Erro ao tentar cadastrar.';
		}
	}
 ?>