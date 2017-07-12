<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Informações categoria</title>
	<link rel="stylesheet" type="text/css" href="../css/select.css">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
</head>
<body>
<div>
	<?php
		
		require_once("../classes/Categoria.php");
		require_once("../dao/CategoriaDao.php");

		$categoria = new  Categoria();

		if(isset($_POST["txtPesquisa"])){
			$categoria->nome = $_POST["txtPesquisa"];
		}else{
			$categoria->nome = "";
		}

		$dao = new CategoriaDao();

		$select = $dao->consultaCategoria($categoria);


			
				$num = 0;
				echo "	<form method='post' action='formConsultaCategoria.php'>
							<input type='search' class='search' size='40' name='txtPesquisa'>
							<input type='submit' value='Pesquisar' class='btn'>

							<a href='formCadastroCategoria.php'>
								<img src='../icons/adc.png' class='right'>
							</a>
		
						</form>
						<br>
						<br>";

				echo "	<table>
						<tr>
							<th><h2>Codigo</h2></th>
							<th><h2>Nome</h2></th>
							<th><h2>CRUD</h2></th>
						</tr>";

				if($select){
				foreach ($select as $usr) {
					echo "<tr>
							<td>".$select[$num]['CODIGO']."</td>
							<td>".$select[$num]['NOME']."</td>
							<td><a href='../actions/deletaCategoria.php?codigo=".$select[$num]['CODIGO']."'>
									<img src='../icons/del.png'
								</a>
								<a href='formAtualizaCategoria.php?codigo=".$select[$num]['CODIGO']."'>
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
