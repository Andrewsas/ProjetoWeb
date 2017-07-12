<?php
require_once("../bd/conexaobd.php");

class CurriculoDao{
	public $conn;

	function CurriculoDao(){
		$this->conn = conexao::conectar();
	}

	// Função cadastra Curriculo *******************************************
	function cadastraCurriculo($curriculo){
		try{
			$sql = "call sp_cadastracurriculo(?,?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$curriculo->email);
			$stmt->bindParam(++$num,$curriculo->descricao);
			$stmt->bindParam(++$num,$curriculo->nome);
			$stmt->bindParam(++$num,$curriculo->localup);

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

	// Função deleta Curriculo *******************************************
	function deletaCurriculo($curriculo){
		try{
			$sql = "call sp_deletacurriculo(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$curriculo->codigo);

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

	// Função Consulta Curriculo *******************************************
	function consultaCurriculo($curriculo){
		try{
			$sql = "call sp_visualizacurriculo(?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$curriculo->email);

			// executa statement
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
	