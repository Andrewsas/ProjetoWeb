<?php
	
	require_once("../classes/Curriculo.php");
	require_once("../dao/CurriculoDao.php");

	$curriculo = new  Curriculo();

	$curriculo->codigo = $_GET["codigo"];
	
	$dao = new CurriculoDao();
	$delete = $dao->deletaCurriculo($curriculo);

	if($delete){
		$num = 0;
		foreach ($delete as $usr) {
			echo "<script>alert('".$delete[$num]['MENSAGEM']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaCurriculo.php','_self');
			</script>";
			$num++; 
		}
	}		
?>