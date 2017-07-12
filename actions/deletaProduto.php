<?php
	include("conexao.php");

	try{

		$codigo = $_GET["codigo"];

		$sql = "call sp_deletaproduto(?);";
		//preparando statement
		$stmt = $conn->prepare($sql);
		
		$stmt->bindParam(1,$codigo);

		// executa statement
		$stmt->execute();

		if($stmt){
			foreach ($stmt as $usr) {
				echo "<script>alert('".$usr['MENSAGEM']."');</script>";	
				echo 
				"<script>
					window.open('infproduto.php','_self');
				</script>"; 
			}
		}else{
			echo "<script>alert('O registro não pode ser apagado.');</script>";
		}
		
	}catch(Exception $e){
		echo "Erro: ".$e->getMessage();
		exit;
	}
?>

<?php
	
	require_once("../classes/Produto.php");
	require_once("../dao/ProdutoDao.php");

	$produto = new  Produto();

	$produto->codigo = $_GET["codigo"];
	
	$dao = new ProdutoDao();
	$deleta = $dao->deletaProduto($produto);

	if($deleta){
		$num = 0;
		foreach ($deleta as $usr) {
			echo "<script>alert('".$deleta[$num]['MENSAGEM']."');</script>";	
			echo 
				"<script>
					window.open('../forms/formConsultaProduto.php','_self');
				</script>";
			$num++; 
		}	
	}	
?>