<?php
	require_once("../classes/Usuario.php");
	require_once("../dao/UsuarioDAO.php");

	$usuario = new Usuario();

	$usuario->codigo=$_GET["codigo"];
	
	$dao = new UsuarioDao();

	$carrega = $dao->consultaTudoUsuario($usuario);

	if($carrega){
		foreach ($carrega as $usr) {
			$usuario->nome = $usr["NOME"];
			$usuario->sobrenome = $usr["SOBRENOME"];
			$usuario->email = $usr["EMAIL"];
			$usuario->sexo = $usr["SEXO"];
			$usuario->dtNascimento = $usr["DATA DE NASCIMENTO"];
			$usuario->telefone = $usr["TELEFONE"];
			$usuario->senha = $usr["SENHA"];
		}
	}	
?>