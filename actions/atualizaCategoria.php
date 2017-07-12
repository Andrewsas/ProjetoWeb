<?php
	
	require_once("../classes/Categoria.php");
	require_once("../dao/CategoriaDao.php");

	$categoria = new  Categoria();

	$categoria->codigo = $_POST["txtCodigo"];
	$categoria->nome = $_POST["txtNome"]; 

	$dao = new CategoriaDao();

	$inseriu = $dao->atualizaCategoria($categoria);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['RETURN']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaCategoria.php','_self');
			</script>"; 
			$num++;
		}
	}		
?>
