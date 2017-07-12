<?php
require_once("../bd/conexaobd.php");

class LoginDao{
	public $conn;

	function LoginDao(){
		$this->conn = conexao::conectar();
	}

	// Função validar login *******************************************
	function validaLogin($login){
		session_start();
		try{
			$sql = "call sp_validalogin(?,?);";

			//preparando statement
			$stmt = $this->conn->prepare($sql);
			///variavel de auxilio paramentro
			$num = 0; 
			// passagem de parametro
			$stmt->bindParam(++$num,$login->email);
			$stmt->bindParam(++$num,$login->password);
			

			// executa statement
			$stmt->execute();
			
			if($stmt){
				foreach ($stmt as $usr) {
					if($usr["RETURN"] == 1){		
						$_SESSION["logado"] = true;
						$_SESSION["usunome"] = $usr["USUARIO"];
						$_SESSION["usucodigo"] = $usr["CODIGO"];
						$_SESSION["usutipo"] = $usr["TIPO"];

						echo "<script>
								window.open('../index.php','_top');
							</script>";
										
					}else{
						session_destroy();
						echo "<script>
								alert('Dados inválidos');
								window.open('../forms/formLogin.php','_self');
							</script>";	
						break;
					}
				}
			}

		}catch(Exception $e){
			echo "Erro: ".$e->getMessage();
		}
	}

}	
?>
	