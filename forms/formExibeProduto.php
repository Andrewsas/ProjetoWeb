<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produtos</title>	
	<link rel="stylesheet" type="text/css" href="../css/moveis.css">
</head>
	
	<section>
		<ul>
			<?php
				require_once("../classes/Produto.php");
				require_once("../dao/ProdutoDAO.php");

				$produto = new Produto();

				$produto->categoria=$_GET["categoria"];
				
				$dao = new ProdutoDao();

				$consulta = $dao->exibeProduto($produto);
				if($consulta){
					$num = 0;
					foreach ($consulta as $usr) {
						echo "	<a href='formPagamento.php?codigo=".$consulta[$num]["CODIGO"]."'>
									<li>
										<img src='".$consulta[$num]["IMAGEM"]."' width='300px' height='250px'>
										<p>".$consulta[$num]["NOME"]." por R$ ".$consulta[$num]["PRECO"]."</p>
									</li>
								</a>";
					}
					unset($consulta);
				}
				
			?>
		</ul>
	</section>
</body>
</html>