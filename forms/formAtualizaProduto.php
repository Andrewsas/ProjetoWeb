<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<script type="text/javascript" src="../js/validaCadastroProduto.js"></script>
	<title>Formulario de Cadastro de Produtos</title>	
</head>
<body>

	<?php
		include("../actions/carregaUsuario.php");
	?>
	<table id="formularioupload">	
		<tr>
			<div class="novocad">
				<td>
					<form method="post" enctype="multipart/form-data" action="../actions/cadastraProduto.php" onsubmit="return validaCadastroProduto()">
				   	<table class="recuo">
						<tr>
							<th colspan="2"><h2>Dados do Produto</h2></th>
						<tr>
					   	
					   	<tr>
							<td><label for="nomeproduto">Nome:</label></td>
							<td><input type="text" name="txtnomeproduto" id="txtnomeproduto" size="40px" value="<?=$produto->nome?>" /></td>
					   	</tr>
					   	
					   	<tr>
							<td><label for="precoproduto">Preço:</label></td>
							<td><input type="text" name="txtprecoproduto" id="txtprecoproduto" size="10px" value="<?=$produto->preco?>" /></td>
						</tr>
						
						<tr>
							<td><label for="qtdeproduto">Quantidade:</label></td>
							<td><input type="number" name="qtdeproduto" id="qtdeproduto" min="1" max="1000" value="<?=$produto->quantidade?>"/><td>
					  	</tr>
					   	
					   	<tr>
							<td><label for="descproduto">Descrição:</label></td>
							<td><textarea type="text" name="txtdescproduto" id="txtdescproduto" cols="50" rows="5" value="<?=$produto->descricao?>"></textarea></td>
					   	</tr>
					   
					   	<tr>		
						<?php 

							require_once("../classes/Categoria.php");
							require_once("../dao/CategoriaDao.php");
						
							$categoria = new  Categoria();

							$categoria->nome=$_POST["txtNome"];

							$dao = new CategoriaDao();
							$consulta = $dao->cadastraCategoria($categoria);

							$num = 0;
							echo 
							"<td>
								<label for='txtcatproduto'>Categoria:</label>
							</td>

							<td>						
								<select name ='txtcatproduto'>
									<option>Selecione...</option>";
								 	foreach ($consulta as $usr) { 
										echo 
										"<option value=".$consulta[$num]['CODIGO'] if($produto->categoria == $consulta[$num]['CATEGORIA']){ echo "selected";}. ">".$consulta[$num]['CATEGORIA']."</option>";
										$num++;
									}
								echo 
								"</select>
							</td>";

						?>
					   </tr>

					   <tr>
						   <td><label for="arqproduto">Imagem:</label></td>
						   <td>	<input type="file" name="arquivo" id="arquivo" /></td>
					   </tr>
				        
				        <tr>
	   				    	<td colspan="2"><input class="submit" type="submit" value="Cadastrar"/></td>
					   </tr>
					</table>
					</form>
				</td>
			</div>	
		</tr>
	</table>
</body>
</html>