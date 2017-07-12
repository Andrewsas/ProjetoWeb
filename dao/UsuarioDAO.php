<?php
require_once("../bd/conexaobd.php");

class UsuarioDao{
	public $conn;

	function UsuarioDao(){
		$this->conn = conexao::conectar();
	}

	// Função cadastra usuario *******************************************
	function cadastraUsuario($usuario){
		try{
		
			$sql = "call sp_cadastrausuario(?,?,?,?,?,?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 

			$usuario->nome .= " ".$usuario->sobrenome;
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->tipo);
			$stmt->bindParam(++$num,$usuario->email);
			$stmt->bindParam(++$num,$usuario->nome);
			$stmt->bindParam(++$num,$usuario->password);
			$stmt->bindParam(++$num,$usuario->dtNascimento);
			$stmt->bindParam(++$num,$usuario->sexo);
			$stmt->bindParam(++$num,$usuario->telefone);

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
			exit;
		}
	}
	// **********************************************************************

	// Deleta usuario *******************************************************
	function deletaUsuario($usuario){
		try{
			$sql = "call sp_deletausuario(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$stmt->bindParam(1,$usuario->codigo);

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
			exit;
		}
	}
	// **********************************************************************

	// Atualiza usuario *****************************************************
	function atualizaUsuario($usuario){
		try{
			$sql = "call sp_atualizausuario(?,?,?,?,?,?,?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$usuario->nome .= " ".$usuario->sobrenome;
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$usuario->codigo);
			$stmt->bindParam(++$num,$usuario->email);
			$stmt->bindParam(++$num,$usuario->nome);
			$stmt->bindParam(++$num,$usuario->password);
			$stmt->bindParam(++$num,$usuario->dtNascimento);
			$stmt->bindParam(++$num,$usuario->sexo);
			$stmt->bindParam(++$num,$usuario->telefone);

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
			exit;
		}
	}
	// *************************************************************************

	// Carrega usuario *********************************************************
	function consultaUsuario($usuario){
		try{
			$sql = "call sp_visualizausuario(?,?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
		
			// passagem de parametro
			$stmt->bindParam(1,$usuario->tipo);
			$stmt->bindParam(2,$usuario->email);

			$stmt->execute();

			foreach ($stmt as $usr) {
				$vetor[] = $usr;
			}

			if(isset($vetor)){
				return $vetor;
			}
		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
			exit;
		}
	}

	function consultaTudoUsuario($usuario){
		try{
			$sql = "call sp_visualizatudousuario(?);";

			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(1,$usuario->codigo);

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