<?php
	
	require_once("../classes/Usuario.php");
	require_once("../dao/UsuarioDao.php");

	$administrador = new  Usuario();

	$administrador->codigo=$_GET["codigo"];
	
	$dao = new UsuarioDao();
	$inseriu = $dao->deletaUsuario($administrador);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['MENSAGEM']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaAdministrador.php','_self');
			</script>"; 
			$num++;
		}
	}		
?>