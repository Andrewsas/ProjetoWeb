<?php
require_once("../bd/conexaobd.php");

class ProdutoDao{
	public $conn;

	function ProdutoDao(){
		$this->conn = conexao::conectar();
	}

	// Função cadastra usuario *******************************************
	function cadastraProduto($produto){
		


		// verifica se foi enviado um arquivo 
		if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
		{

			/*echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
			echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
			echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
			echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
*/
			$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
			$nome = $_FILES['arquivo']['name'];
			

			// Pega a extensao
			$extensao = strrchr($nome, '.');

			// Converte a extensao para minusculo
			$extensao = strtolower($extensao);

			// Somente imagens, .jpg;.jpeg;.gif;.png
			// Aqui eu enfilero as extesões permitidas e separo por ';'
			// Isso server apenas para eu poder pesquisar dentro desta String
			if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
			{
				// Cria um nome único para esta imagem
				// Evita que duplique as imagens no servidor.
				$novoNome = md5(microtime()) . $extensao;
				
				// Concatena a pasta com o nome
				$destino = '../imagens/' . $novoNome; 
				
				//echo $destino;
				
				// tenta mover o arquivo para o destino
				if( @move_uploaded_file( $arquivo_tmp, $destino  ))
				{
					//echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
					//echo "<img src=\"" . $destino . "\" />";
					try{
						$sql = "call sp_cadastraproduto(?,?,?,?,?,?);";

						//preparando statement
						$stmt = $this->conn->prepare($sql);
						///variavel de auxilio paramentro
						$num = 0; 
						// passagem de parametro
						$stmt->bindParam(++$num,$produto->categoria);
						$stmt->bindParam(++$num,$produto->nome);
						$stmt->bindParam(++$num,$produto->quantidade);
						$stmt->bindParam(++$num,$produto->preco);
						$stmt->bindParam(++$num,$produto->descricao);
						$stmt->bindParam(++$num,$destino);
						
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
				else
					echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
			}
			else
				echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
		}
		else
		{
			echo "Você não enviou nenhum arquivo!";
		}






	}
	// **********************************************************************

	// Deleta produto *******************************************************
	function deletaUsuario($produto){
		try{
			$sql = "call sp_deletaproduto(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
			
			$stmt->bindParam(1,$produto->codigo);

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

	// Carrega produto *********************************************************
	function consultaProduto($produto){
		try{
			$sql = "call sp_consultaproduto(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
		
			// passagem de parametro
			$stmt->bindParam(1,$produto->nome);

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

	// Exibe produto *********************************************************
	function exibeProduto($produto){
		try{
			$sql = "call sp_exibeproduto(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
		
			// passagem de parametro
			$stmt->bindParam(1,$produto->categoria);

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

	// Consulta tudo Produto
	function consultaTudoProduto($produto){
		try{
			$sql = "call sp_consultatudoproduto(?);";
			//preparando statement
			$stmt = $this->conn->prepare($sql);
		
			// passagem de parametro
			$stmt->bindParam(1,$produto->codigo);

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
}

?>