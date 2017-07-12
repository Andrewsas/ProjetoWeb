<?php
	
	require_once("../classes/Usuario.php");
	require_once("../dao/UsuarioDao.php");

	$administrador = new  Usuario();

	$administrador->nome=$_POST["txtNome"];
	$administrador->email=$_POST["txtEmail"];
	$administrador->sobrenome=$_POST["txtSegundoNome"];
	$administrador->password=$_POST["txtPassword"];
	$administrador->sexo=$_POST["txtSexo"];
	$administrador->dtNascimento=$_POST["txtData"];
	$administrador->telefone=$_POST["txtTelefone"];
	$administrador->tipo = "administrador";
	
	$dao = new UsuarioDao();
	$inseriu = $dao->cadastraUsuario($administrador);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['MENSAGEM']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaAdministrador.html','_self');
			</script>"; 
			$num++;
		}
	}		
?>