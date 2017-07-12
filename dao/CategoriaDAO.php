<?php
require_once("../bd/conexaobd.php");

class CategoriaDao{
	public $conn;

	function CategoriaDao(){
		$this->conn = conexao::conectar();
	}

	// Cadastra Categoria *******************************************
	function cadastraCategoria($categoria){
		try{
			
			$sql = "call sp_cadastraCategoria(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->nome);
				

			// executa statement
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			return $vetor;

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

	// Lista Categoria
	function consultaTudoCategoria($categoria){
		try{
			
			$sql = "call sp_consultatudocategoria(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->codigo);

			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}
		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

	// Consulta Categoria
	function consultaCategoria($categoria){
		try{
			
			$sql = "call sp_consultacategoria(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->nome);

			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}
		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

	// Atualiza Categoria
	function atualizaCategoria($categoria){
		try{
			
			$sql = "call sp_atualizacategoria(?,?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->codigo);
			$stmt->bindParam(++$num,$categoria->nome);

			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}
		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

	//Deletar Categoria
	function deletaCategoria($categoria){
		try{
			
			$sql = "call sp_deletacategoria(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$categoria->codigo);

			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}
		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

	// Consulta Categoria
	function consultaMenu(){
		try{
			
			$sql = "call sp_consultamenu();";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}
		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}


}	
?>
	