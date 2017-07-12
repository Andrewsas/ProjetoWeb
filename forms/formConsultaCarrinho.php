<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Informações Mensagem</title>
	<link rel="stylesheet" type="text/css" href="../css/select.css">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
</head>
<body>
<div>
	
	<?php
		
		require_once("../classes/Statu.php");
		require_once("../dao/StatuDao.php");

		$statu = new  Statu();

		if(isset($_POST["txtPesquisa"])){
			$busca = $_POST["txtPesquisa"];
		}else{
			$busca = "";
		}
		
		
		$dao = new StatuDao();
		
		$select = $dao->consultaStatu($curriculo);
		
		
			echo "	<form method='post' action='formConsultaCarrinho.php'>
					<input type='search' class='search' size='40' name='txtPesquisa'>
					<input type='submit' value='Pesquisar' class='btn'>
	
					</form>
					<br>
					<br>";

			echo "	<table>
					<tr>
						<th><h2>Codigo</h2></th>
						<th><h2>Produto</h2></th>
						<th><h2>Cliente</h2></th>
						<th><h2>Local</h2></th>
						<th><h2>Data</h2></th>
						<th><h2>CRUD</h2></th>
					</tr>";
			if($select){
				$num = 0;
			foreach ($select as $usr) {
				echo "<tr>
						<td>".$select[$num]['CODIGO']."</td>
						<td>".$select[$num]['NOME']."</td>
						<td>".$select[$num]['EMAIL']."</td>
						<td>".$select[$num]['LOCAL']."</td>
						<td>".$select[$num]['DATA']."</td>
						<td><a href='../actions/deletaCurriculo.php?codigo=".$select[$num]['CODIGO']."'>
								<img src='../icons/del.png'
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
