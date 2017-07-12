<?php
	require_once("../classes/Cliente.php");
	require_once("../dao/ClienteDAO.php");

	$cliente = new Cliente();

	$cliente->codigo=$_GET["txtCodigo"];
	$cliente->tipo="cliente";
	
	$dao = new ClienteDao();

	$consulta = $dao->consultaCliente($cliente,$tipo);
		
	if($consulta){

			echo "	<form method='post' action='infcliente.php'>
				<input type='search' class='search' size='40' name='txtPesquisa'>
				<input type='submit' value='Pesquisar' class='btn'>
				

				<a href='formCadastroCliente.php'>
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
		foreach ($consulta as $usr) {
			echo "<tr>
					<td>".$usr['CODIGO']."</td>
					<td>".$usr['NOME']."</td>
					<td>".$usr['EMAIL']."</td>
					<td>".$usr['SEXO']."</td>
					<td>".$usr['DATA DE NASCIMENTO']."</td>
					<td><a href='delcliente.php?codigo=".$usr['CODIGO']."'>
							<img src='../icons/del.png'
						</a>
						<a href='updcliente.php?codigo=".$usr['CODIGO']."'>
							<img src='../icons/upd.png'
						</a>
					</td>
				  </tr>";
		}
		unset($stmt);
	}
	
?>