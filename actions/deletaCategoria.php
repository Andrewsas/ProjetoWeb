<?php
	
	require_once("../classes/Categoria.php");
	require_once("../dao/CategoriaDao.php");

	$categoria = new  Categoria();

	$categoria->codigo = $_GET["codigo"];
	
	$dao = new CategoriaDao();
	$deleta = $dao->deletaCategoria($categoria);

	if($deleta){
		$num = 0;
		foreach ($deleta as $usr) {
			echo "<script>alert('".$deleta[$num]['RETURN']."');</script>";	
			echo 
				"<script>
					window.open('../forms/formConsultaCategoria.php','_self');
				</script>";
			$num++; 
		}	
	}	
?>