<?php
	
	require_once("../classes/Mensagem.php");
	require_once("../dao/MensagemDao.php");

	$mensagem = new  Mensagem();

	$mensagem->codigo = $_GET["codigo"];
	
	$dao = new MensagemDao();
	$deleta = $dao->deletaMensagem($mensagem);

	if($deleta){
		$num = 0;
		foreach ($deleta as $usr) {
			echo "<script>alert('".$deleta[$num]['MENSAGEM']."');</script>";	
			echo 
				"<script>
					window.open('../forms/formConsultaMensagem.php','_self');
				</script>";
			$num++; 
		}	
	}	
?>