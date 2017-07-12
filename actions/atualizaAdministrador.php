<?php
	require_once("../classes/Usuario.php");
	require_once("../dao/UsuarioDAO.php");

	$usuario = new Usuario();

	$usuario->codigo=$_POST["txtCodigo"];
	$usuario->nome=$_POST["txtNome"];
	$usuario->email=$_POST["txtEmail"];
	$usuario->sobrenome=$_POST["txtSegundoNome"];
	$usuario->password=$_POST["txtPassword"];
	$usuario->sexo=$_POST["txtSexo"];
	$usuario->dtNascimento=$_POST["txtData"];
	$usuario->telefone=$_POST["txtTelefone"];

	$dao = new UsuarioDao();

	$atualiza = $dao->atualizaUsuario($usuario);
		
	if($atualiza){
		foreach ($atualiza as $usr) {
			echo 
				"<script>
					alert('".$usr['MENSAGEM']."');
					window.open('../forms/formConsultaAdministrador.php','_self');
				</script>"; 
		}
	}
?>