<?php
require_once("../bd/conexaobd.php");

class MensagemDao{
	public $conn;

	function MensagemDao(){
		$this->conn = conexao::conectar();
	}
	// Função cadastra Mensage *******************************************
	function cadastraMensagem($mensagem){
		try{
			$sql = "call sp_cadastramensagem(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0;
			// passagem de parametro
			$stmt->bindParam(++$num,$mensagem->descricao);
			$stmt->bindParam(++$num,$mensagem->email);

			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			return $vetor;

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

	// Função deleta Mensage *******************************************
	function deletaMensagem($mensagem){
		try{
			$sql = "call sp_deletamensagem(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$stmt->bindParam(1,$mensagem->codigo);

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

	// Confirmação do delet mensagem **********************************
	function confirmeDelete(){
		
	}

	// Função consulta Mensagem ***************************************
	function consultaMensagem($mensagem){

		try{

			$sql = "call sp_exibemensagem(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
		
			// passagem de parametro
			$stmt->bindParam(1,$mensagem->email);

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