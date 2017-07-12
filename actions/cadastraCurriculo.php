<?php
	
	require_once("../classes/Curriculo.php");
	require_once("../dao/CurriculoDao.php");

	$curriculo = new  Curriculo();

	$curriculo->nome = $_POST["txtNome"];
	$curriculo->email = $_POST["txtEmail"];
	$curriculo->descricao = $_POST["txtDescricao"];
	$curriculo->localup = "/submundo/";
	
	$dao = new CurriculoDao();
	$inseriu = $dao->cadastraCurriculo($curriculo);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['MENSAGEM']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formCadastroCurriculo.html','_self');
			</script>"; 
			$num++;
		}
	}		
?>