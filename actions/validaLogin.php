<?php
	
	require_once("../classes/Usuario.php");
	require_once("../dao/LoginDao.php");

	$login = new  Usuario();

	$login->email = $_POST["txtEmailLogin"];
	$login->password = $_POST["txtSenhaLogin"];
	
	$dao = new LoginDao();
	$valida = $dao->validaLogin($login);
		
?>