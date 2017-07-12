<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Informações Administrador</title>
	<link rel="stylesheet" type="text/css" href="../css/select.css">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
</head>
<body>
<div>
	
	<?php
		
		require_once("../classes/Usuario.php");
		require_once("../dao/UsuarioDao.php");

		$administrador = new  Usuario();

		$administrador->tipo = "administrador";

		if(isset($_POST["txtPesquisa"])){
			$administrador->email = $_POST["txtPesquisa"];			
		}else{
			$administrador->email = "";
		}
		
		$dao = new UsuarioDao();
		$select = $dao->consultaUsuario($administrador);

		
		$num = 0;
		echo "	<form method='post' action='formConsultaAdministrador.php'>
				<input type='search' class='search' size='40' name='txtPesquisa'>
				<input type='submit' value='Pesquisar' class='btn'>
				

				<a href='formCadastroAdministrador.html'>
					<img src='../icons/adc.png' class='right'>
				</a>
				</form>
				<br>
				<br>";

		echo "	<table>
				<tr>
					<th><h2>Codigo</h2></th>
					<th><h2>Nome</h2></th>
					<th><h2>Email</h2></th>
					<th><h2>Sexo</h2></th>
					<th><h2>Data de Nascimento</h2></th>
					<th><h2>CRUD</h2></th>
				</tr>";
				
		if($select){
			foreach ($select as $usr) {
				echo "<tr>
						<td>".$select[$num]['CODIGO']."</td>
						<td>".$select[$num]['NOME']."</td>
						<td>".$select[$num]['EMAIL']."</td>
						<td>".$select[$num]['SEXO']."</td>
						<td>".$select[$num]['DATA DE NASCIMENTO']."</td>
						<td><a href='../actions/deletaAdministrador.php?codigo=".$select[$num]['CODIGO']."'>
								<img src='../icons/del.png'
							</a>
							<a href='formAtualizaAdministrador.php?codigo=".$select[$num]['CODIGO']."'>
								<img src='../icons/upd.png'
							</a>
						</td>
					  </tr>";
				$num++;
			}
			unset($select);
		}
		
	?>
</div>
</body>
</html>
