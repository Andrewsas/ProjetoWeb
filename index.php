<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>HOME</title>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script language="JavaScript" type="text/javascript">
		window.onresize = AjustarIFrame;
		function AjustarIFrame()
	   	{
		    if (navigator.appName.indexOf("Microsoft") != -1)
		    {
		 	   document.getElementById('meuiframe').height = document.documentElement.clientHeight;
		    }
		    else
		    {
		    	document.getElementById('meuiframe').height = window.innerHeight;
		    }
	   	}
	</script> 
<head>
<body onload="JavaScript:AjustarIFrame();">
	<div id="interface">
		<header>
			<form class="pesquisa">
				<a href="home.html" target="iframecorpo"><img src="icons/home.png" class="logo"></a>
				<input type="search" class="search">
				<input type="button" value="Pesquisar" class="btn">
			</form>
			<hr></hr>
			<nav id="navmenucategorias">
			  <ul class="menucategorias">
				<li><a href="ambiente.html" target="iframecorpo">AMBIENTE</a>
				  <ul class="submenu">
				    <li><a href="forms/formExibeProduto.php?categoria=banheiro" target="iframecorpo">BANHEIRO </a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=cozinha" target="iframecorpo">COZINHA</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=quarto"	target="iframecorpo">QUARTO</a></li>		
				  </ul>
				</li>
				<li><a href="moveis.html" target="iframecorpo">MOVEIS</a>
			 	  <ul class="submenu">
				    <li><a href="forms/formExibeProduto.php?categoria=cadeiras">CADEIRAS</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=camas">CAMAS</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=mesas">MESAS</a></li>		
				  </ul>
				</li>
				<li><a href="decoracao.html" target="iframecorpo">DECORAÇÃO</a>
				  <ul class="submenu">
				    <li><a href="forms/formExibeProduto.php?categoria=adesivos">ADESIVO</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=iluminação">ILUMINAÇÃO</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=vasos">VASOS</a></li>		
				  </ul>
				</li>
				<li><a href="utilidades.html" target="iframecorpo">ULTILIDADES</a>
				  <ul class="submenu">
				    <li><a href="forms/formExibeProduto.php?categoria=acessórios de banheiros">ACESSÓRIO DE BANHEIRO</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=acessório de mesa">ACESSÓRIO DE MESA</a></li>
				    <li><a href="forms/formExibeProduto.php?categoria=papelaria">PAPELARIA</a></li>		
				  </ul>
				</li>
					<?php 
						if(isset($_SESSION["usunome"])) {
				            echo "	<li class='login'>
				            			<a href='forms/formCarrinho.php' target='iframecorpo'>".$_SESSION["usunome"]."</a>
				            		</li>
					            	<li class='login'>
					            		<a href='actions/destroiSessao.php' target='iframecorpo'>Sair</a>
					            	</li>
				            	";
				        }else{
				          	 echo "	<li>
				          	 			<a href='forms/formLogin.php' target='iframecorpo'>Login</a>
				          	 		</li>";
				        }
					?>
				<li>		
						<?php
				             //verifica se a sessao de carrinho foi iniciada
				             if(isset($_SESSION["carrinho"])) {
				               //recupera a qtde de produtos do carrinho
				               $qtdeProdutosCarrinho = "<p>".sizeof($_SESSION["carrinho"]."</p>");
				               echo "<a href='forms/formCarrinho.php'>
				               			<img src='icons/cart.png' class='carrinho'>".$qtdeProdutosCarrinho.
				               		"</a>";
				             }
				             else{
				             	echo "<a href='forms/formLogin.php'>
				               			<img src='icons/cart.png' class='carrinho'><p>0</p>
				               		</a>";
				             }
				        ?>
				</li>	
			  </ul>
			</nav>
			<hr></hr>
		</header>
	
		<div class="corpo"
>			<!-- CONTEUDO DA PAGINA-->
			<section id="">
				<div class="conteudo">
					<iframe id="meuiframe" src="Home.html" name="iframecorpo" scrolling="no" frameborder="0" width="100%" height="0"></iframe>
				</div>
			</section>
		</div>			

		<div class="rodape">
			<!-- RODA PE DA PAGINA-->
			<footer>
				<div class="inf">
					<nav>
						<ul>
							<li><a href="institucional.html" target="iframecorpo">INSTITUCIONAL</a></li>
							<li><a href="forms/formCadastroMensagem.html" target="iframecorpo">CONTATOS</a></li>
							<li><a href="forms/formCadastroCurriculo.html" target="iframecorpo">TRABALHE COM NOSCO</a></li>
							<li><a href="">VENDA CORPORATIVA</a></li>
							<li><a href="">FORNECEDORES</a></li>
							<li><a href="administrador.php" target="iframecorpo">ADMINISTRADOR</a></li>
						</ul>
					</nav>
				</div>
				<div class="contato">
					<p>2015  Oppa Design Ltda.  www.oppa.com.br Avenida Mofarrej, 825, Galpão nº 02, Vila Leopoldina - CEP 05311-000, São Paulo-SP CNPJ 14.214.549/0001-93 </p>
				</div>
			</footer>
		</div>
	</div>
</body>

<html>
