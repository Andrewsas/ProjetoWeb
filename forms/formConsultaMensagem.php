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
		
		require_once("../classes/Mensagem.php");
		require_once("../dao/MensagemDao.php");

		$mensagem = new  Mensagem();

		if(isset($_POST["txtPesquisa"])){
			$mensagem->email = $_POST["txtPesquisa"];
		}else{
			$mensagem->email = "";
		}

		$dao = new MensagemDao();

		$select = $dao->consultaMensagem($mensagem);


			
				echo "	<form method='post' action='formConsultaMensagem.php'>
						<input type='search' class='search' size='40' name='txtPesquisa'>
						<input type='submit' value='Pesquisar' class='btn'>
		
						</form>
						<br>
						<br>";

				echo "	<table>
						<tr>
							<th><h2>Codigo</h2></th>
							<th><h2>Email</h2></th>
							<th><h2>Descrição</h2></th>
							<th><h2>Data</h2></th>
							<th><h2>CRUD</h2></th>
						</tr>";

				if($select){
				$num = 0;
				foreach ($select as $usr) {
					echo "<tr>
							<td>".$select[$num]['CODIGO']."</td>
							<td>".$select[$num]['EMAIL']."</td>
							<td>".$select[$num]['DESCRICAO']."</td>
							<td>".$select[$num]['DATA']."</td>
							<td><a href='../actions/deletaMensagem.php?codigo=".$select[$num]['CODIGO']."'>
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
