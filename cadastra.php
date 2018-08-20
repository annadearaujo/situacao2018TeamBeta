<?php
	/*função para chamar um outro arquivo dentro do arquivo atual*/
	session_start();
	require_once('db.class.php');

	/*Cria uma nova instancia da classe de conexão.*/
	$objDb = new db();
	$link = $objDb -> conecta_mysql();

	/*Se o usuario clicou no botão Cadastrar, então entra no IF.*/
	if (isset($_POST['titulo_post'])) {
		$titulo_post = $_POST['titulo_post'];
		$texto_post = $_POST['texto_post'];
		$id_tipo_postagem = $_POST['tipo_post'];
		$foto = $_FILES['foto'];
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');
		$id_usuario_adm = $_SESSION['id_usuario'];

	
		if (!empty($foto['name'])){
			
			$largura = 1000;

			/*Delimita a altura maxima.
			Valor em pixels.*/
			$altura = 1000;

			
			$tamanho = 10000000;

			$erro = array();

			/*Verifica se o arquivo é uma imagem*/
			if (!preg_match("/^image\/(pjeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
				$erro[1] = "O arquivo escolhido não é uma imagem válida!";
			}

			//Pega as dimensões da imagem
			$dimensoes = getimagesize($foto["tmp_name"]);

			/*Verificar se a largura da imagem é maior que a largura permitida.*/
			if($dimensoes[0]>$largura){
				$erro[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels.";
			}

		
			if($dimensoes[1]>$altura){
				$erro[3] = "A altura da imagem não deve ser maior que ".$altura." pixels.";
			}

			if($foto["size"]>$tamanho){
				$erro[4] = "A imagem deve ter no maximo ".$tamanho." bytes.";
			}

			/*Se não houverem erros*/
			if(count($erro)==0){
				/*Pegar a extensão da imagem.*/
				preg_match("/\.(gif|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

				/*Gera um nome único para a imagem.*/
				$nome_imagem = md5(uniqid(time())).".".$ext[1];

				/*Caminho onde ficará a imagem*/
				$caminho_imagem = "fotos/".$nome_imagem;

				move_uploaded_file($foto["tmp_name"], $caminho_imagem);

				
				$query = "INSERT INTO `postagens`(`id_tipo_postagem`, `data_hora`, `img_postagem`, `titulo`, `texto`) VALUES ('".$id_tipo_postagem."', '".$date."', '".$nome_imagem."', '".$titulo_post."', '".$texto_post."')";
				
				$sql = mysqli_query($link, $query);

				if($sql){
					header("Location: criar_postagens.php");
				}
			}
			
			if (count($erro)!=0) {
				foreach ($erro as $erro) {
					echo $erro."<br/>";
				}
			}
		}
	}
?>