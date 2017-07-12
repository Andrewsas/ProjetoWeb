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
		
		require_once("../classes/Produto.php");
		require_once("../dao/ProdutoDao.php");

		$produto = new  Produto();

		if(isset($_POST["txtPesquisa"])){
			$produto->nome = $_POST["txtPesquisa"];
		}else{
			$produto->nome = "";
		}

		$dao = new ProdutoDao();

		$select = $dao->consultaProduto($produto);


			
				echo "	<form method='post' action='formConsultaProduto.php'>
						<input type='search' class='search' size='40' name='txtPesquisa'>
						<input type='submit' value='Pesquisar' class='btn'>
						<a href='formCadastroProduto.html'>
							<img src='../icons/adc.png' class='right'>
						</a>
		
						</form>
						<br>
						<br>";

				echo "	<table>
						<tr>
							<th><h2>Codigo</h2></th>
							<th><h2>Nome</h2></th>
							<th><h2>Categoria</h2></th>
							<th><h2>Quantidade</h2></th>
							<th><h2>Imagem</h2></th>
							<th><h2>CRUD</h2></th>
						</tr>";

				if($select){
				$num = 0;
				foreach ($select as $usr) {
					echo "<tr>
							<td>".$select[$num]['CODIGO']."</td>
							<td>".$select[$num]['NOME']."</td>
							<td>".$select[$num]['CATEGORIA']."</td>
							<td>".$select[$num]['QUANTIDADE']."</td>
							<td><img src='".$select[$num]['IMAGEM']."' width='120px' height='100px' </td>
							<td><a href='../actions/deletaProduto.php?codigo=".$select[$num]['CODIGO']."'>
									<img src='../icons/del.png'
								</a>
								<a href='../actions/atualizaProduto.php?codigo=".$select[$num]['CODIGO']."'>
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
