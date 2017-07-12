<?php
	
	require_once("../classes/Usuario.php");
	require_once("../dao/UsuarioDao.php");

	$cliente = new  Usuario();

	$cliente->nome=$_POST["txtNome"];
	$cliente->email=$_POST["txtEmail"];
	$cliente->sobrenome=$_POST["txtSegundoNome"];
	$cliente->password=$_POST["txtPassword"];
	$cliente->sexo=$_POST["txtSexo"];
	$cliente->dtNascimento=$_POST["txtData"];
	$cliente->telefone=$_POST["txtTelefone"];
	$cliente->tipo = "cliente";
	
	$dao = new UsuarioDao();
	$inseriu = $dao->cadastraUsuario($cliente);

	if($inseriu){
		$num = 0;
		foreach ($inseriu as $usr) {
			echo "<script>alert('".$inseriu[$num]['MENSAGEM']."');</script>";	
			echo 
			"<script>
				window.open('../forms/formConsultaCliente.html','_self');
			</script>"; 
			$num++;
		}
	}		
?>