<?php 
	class db{
		/*Para conectar com o banco precisa de 4 informações: host, usuario, senha, database*/
		private $host='localhost';
		private $usuario='root';
		private $senha='';
		private $database='teambeta';

		//método para realizar a conexão
		public function conecta_mysql(){
			//criação da conexão
			$con = mysqli_connect($this -> host, $this -> usuario, $this -> senha, $this -> database);
			/*Ajustar o charset de comunicação entre a aplicação e o banco de dados.*/
			mysqli_set_charset($con, 'utf-8');
			//verifica se conectou
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar conectar com o banco de dados: '.mysqli_connect_error();
			}
			return $con;
		}
	}
 ?>