<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/pagamento.css">
</head>
<body>
				<section>
		<?php 

		require_once("../classes/Produto.php");
		require_once("../dao/ProdutoDao.php");

		$produto = new  Produto();

		$produto->codigo=$_GET["codigo"];
		
		$dao = new ProdutoDao();

		$consulta = $dao->consultaTudoProduto($produto);
			if($consulta){
				$num = 0;
				foreach ($consulta as $usr) {
					$parcela = $consulta[$num]["PRECO"];
					$parcela /= 6;

					echo "
						<header>
							<figure>
								<img src='".$consulta[$num]["IMAGEM"]."' width='700px' height='500px'>
							</figure>
							<div class='pagamento'>
								<br>
								<h1>".$consulta[$num]["NOME"]."</h1>
								<br>
								<p>de R$ ".$consulta[$num]["PRECO"] * 1.1."</p>	
								<p>por ".$consulta[$num]["PRECO"]." a vista</p>
								<p>ou até 6 x ".$parcela." </p>
								<br>
								<a href='#'><p>ver opções de parcelamento</p></a>
							
								<form method='post' action='../actions/adcionaCarrinho.php' onsubmit=''>
									<input type='hidden' name='txtCodigo' value=".$produto->codigo.">
									<input type='number' min='1' name='txtQuantidade' class='qtd'>
									<input type='submit' value='Adicionar ao Carrinho' class='btn'>
								</form>
							
						
							<br>
							<p>".$consulta[$num]["DESCRICAO"].".</p>
								";
				}
				unset($consulta);
			}

		?>
					</div>
				</header>
			<section>
</body>
</html>