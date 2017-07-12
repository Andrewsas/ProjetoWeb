<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
	<style type="text/css">
		a{
			text-decoration: none;
		}

		a:hover h2{
			color: #3399ff;
		}

		li{
			list-style: none;
		}

		input.submit{
			margin-top: 10px;
			width: 20%;
			float: none;
		}

		input:hover{
			box-shadow: 3px 3px 4px #888888;
		}

		li.ferramenta{
			position: fixed;
			top: 0%;
			left:  20%;
			display: none;
			background-color: #f8f8ff;
			width: 80%;
			height: 100%;
			float: right;
		}

		ul.crud{			
			text-align: center;
		}

		ul.crud li{
			display: inline-block;
			padding: 10px;

		}

		iframe.carregaopcoes{
			width: 100%;
			height: 100%;
			border: none;
		}

	</style>

	<script>
		function selecionamenu(x){
			document.getElementById("statu").style.display = "none";
			document.getElementById("administrador").style.display = "none";
			document.getElementById("cliente").style.display = "none";
			document.getElementById("categoria").style.display = "none";
			document.getElementById("produto").style.display = "none";
			document.getElementById("mensagem").style.display = "none";
			document.getElementById("curriculo").style.display = "none";
			document.getElementById(x).style.display = "block";
		}
	</script>
</head>
<body>

	<?php include("actions/verificaSessaoAdministrador.php") ?>
	
	<!-- Opções do menu administrador -->
	<ul>
		<li>
			<input type="button" value="Statu" class="submit" onclick="selecionamenu('statu')"></td>
			<ul>
				<li class="ferramenta" id="statu">
					<ul class="crud">
						<li><a href="forms/formConsultaStatu.php" target="crudStatu"><h2>Informações</h2></a></li>
						<li><a href="../formulario.php" target="crudStatu"><h2>Adicionar</h2></a></li>
					</ul>

					<iframe src="forms/formConsultaStatu.php" name="crudStatu" class="carregaopcoes"></iframe>
				</li>
			</ul>
		</li>
		<li>
			<input type="button" value="Administrador" class="submit" onclick="selecionamenu('administrador')"></td>
			<ul>
				<li class="ferramenta" id="administrador">
					<ul class="crud">
						<li><a href="forms/formConsultaAdministrador.php" target="crudAdministrador"><h2>Informações</h2></a></li>
						<li><a href="forms/formCadastroAdministrador.html" target="crudAdministrador"><h2>Adicionar</h2></a></li>
					</ul>

					<iframe src="forms/formConsultaAdministrador.php" name="crudAdministrador" class="carregaopcoes"></iframe>
				</li>
			</ul>
		</li>
		<li>
			<input type="button" value="Cliente" class="submit" onclick="selecionamenu('cliente')"></td>
			<ul>
				<!-- Sub-opções do menu administrador -->
				<li class="ferramenta" id="cliente">
					<ul class="crud">
							<li><a href="forms/formConsultaCliente.php" target="crudCliente"><h2>Informações</h2></a></li>
							<li><a href="forms/formCadastroCliente.php" target="crudCliente" ><h2>Adicionar</h2></a></li>
					</ul>

					<iframe src="forms/formConsultaCliente.php" id="crudCliente"  name="crudCliente" class="carregaopcoes" ></iframe>

				</li>
			</ul>
		</li>
		<li>
			<input type="button" value="Categoria" class="submit" onclick="selecionamenu('categoria')"></td>
			<ul>
				<li class="ferramenta" id="categoria">
					<ul class="crud">
						<li><a href="forms/formConsultaCategoria.php" target="crudCategoria"><h2>Informações</h2></a></li>
						<li><a href="forms/formCadastroCategoria.php" target="crudCategoria"><h2>Adicionar</h2></a></li>
					</ul>

					<iframe src="forms/formConsultaCategoria.php" name="crudCategoria" class="carregaopcoes"></iframe>
				</li>
			</ul>
		</li>
		<li>
			<input type="button" value="Produto" class="submit" onclick="selecionamenu('produto')"></td>
			<ul>
				<li class="ferramenta" id="produto">
					<ul class="crud">
						<li><a href="forms/formConsultaProduto.php" target="crudProduto"><h2>Informações</h2></a></li>
						<li><a href="forms/formCadastroProduto.php" target="crudProduto"><h2>Adicionar</h2></a></li>
					</ul>

					<iframe src="forms/formConsultaProduto.php" name="crudProduto" class="carregaopcoes"></iframe>
				</li>
			</ul>
		</li>
		<li>
			<input type="button" value="Mensagem" class="submit" onclick="selecionamenu('mensagem')"></td>
			<ul>
				<li class="ferramenta" id="mensagem">
					<ul class="crud">
						<li></li>
					</ul>

					<iframe src="forms/formConsultaMensagem.php" name="crudMensagens" class="carregaopcoes"></iframe>
				</li>
			</ul>
		</li>
		<li>
			<input type="button" value="Curriculo" class="submit" onclick="selecionamenu('curriculo')"></td>
			<ul>
				<li class="ferramenta" id="curriculo">
					<ul class="crud">
						<li></li>
					</ul>

					<iframe src="forms/formConsultaCurriculo.php" name="crudCurriculos" class="carregaopcoes"></iframe>
				</li>
			</ul>
		</li>
	</ul>			
</body>
</html>