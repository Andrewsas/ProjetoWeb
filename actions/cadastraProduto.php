<?php
	
	require_once("../classes/Produto.php");
	require_once("../dao/ProdutoDao.php");

	$produto = new  Produto();

	$produto->nome=$_POST["txtNome"];
	$produto->preco=$_POST["txtPreco"];
	$produto->descricao=$_POST["txtDescricao"];
	$produto->categoria=$_POST["txtCategoria"];
	$produto->quantidade=$_POST["txtQuantidade"];
						
	
	$dao = new ProdutoDao();
	$inseriu = $dao->cadastraProduto($produto);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['RETURN']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaProduto.php','_self');
			</script>"; 
			$num++;
		}
	}		
?>

