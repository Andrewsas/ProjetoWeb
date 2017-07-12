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
			echo "	<a href='pagamento.php?codigo=".$consulta[$num]["CODIGO"]."'>
						<li>
							<img src='".$consulta[$num]["IMAGEM"]."' width='300px' height='250px'>
							<p>".$consulta[$num]["NOME"]." por R$ ".$consulta[$num]["PRECO"]."</p>
						</li>
					</a>";
			$parcela = $consulta[$num]["PRECO"];
			$parcela /= 6;

			echo "
				<header>
					<figure>
						<img src='".$consulta[$num]["IMAGEM"]."'>
					</figure>
					<div class='pagamento'>
						<br>
						<h1>".$consulta[$num]["NOME"]."</h1>
						<br>
						<p>de R$ 499,00</p>	
						<p>por ".$consulta[$num]["PRECO"]." a vista</p>
						<p>ou até 6x".$parcela." </p>
						<br>
						<a href='#'><p>ver opções de parcelamento</p></a>
					
						<form method='post' action='' onsubmit=''>
							<input type='number' min='1' name='txtQuantidade' class='qtd'>
							<input type='submit' value='Adicionar ao Carrinho' class='btn'>
						</form>
					
					</div>
				</header>
				<section>
					<br>
					<p>".$consulta[$num]["DESCRICAO"].".</p>
						";
		}
		unset($consulta);
	}

?>