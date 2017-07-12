<?php
	
	require_once("../classes/Usuario.php");
	require_once("../dao/UsuarioDao.php");

	$cliente = new  Usuario();

	$cliente->codigo=$_GET["codigo"];
	
	$dao = new UsuarioDao();
	$inseriu = $dao->deletaUsuario($cliente);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['MENSAGEM']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaCliente.php','_self');
			</script>"; 
			$num++;
		}
	}		
?>