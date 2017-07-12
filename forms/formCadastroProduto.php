<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<script type="text/javascript" src="../js/validaCadastroProduto.js"></script>
	<title>Formulario de Cadastro de Produtos</title>	
</head>
<body>
	<table id="formularioupload">	
		<tr>
			<div class="novocad">
				<td>
					<form method="post" enctype="multipart/form-data" action="../actions/cadastraProduto.php" onsubmit="return validaCadastroProduto()">
				   	<table class="recuo">
						<tr>
							<th colspan="4"><h2>Dados do Produto</h2></th>
						<tr>
					   	
					   	<tr>
							<td><label for="txtNome">Nome:</label></td>
							<td colspan="4"><input type="text" name="txtNome" id="txtnomeproduto" size="40px" /></td>
					   	</tr>
					   	
					   	<tr>
							<td><label for="txtPreco">Preço:</label></td>
							<td><input type="text" name="txtPreco" id="txtprecoproduto" size="10px" /></td>
							<td><label for="txtQuantidade">Quantidade:</label></td>
							<td><input type="number" name="txtQuantidade" id="qtdeproduto" min="1" max="1000" /><td>
						</tr>
				
					   	<tr>
							<td><label for="txtDescricao">Descrição:</label></td>
							<td colspan="3" ><textarea type="text" name="txtDescricao" id="txtdescproduto" cols="50" rows="5"></textarea></td>
					   	</tr>
					   
					   	<tr>		
						<?php 

							require_once("../classes/Categoria.php");
							require_once("../dao/CategoriaDao.php");
						
							$categoria = new  Categoria();

							$categoria->nome="";

							$dao = new CategoriaDao();
							$consulta = $dao->consultaCategoria($categoria);

							$num = 0;
							echo 
							"<td>
								<label for='txtCategoria'>Categoria:</label>
							</td>

							<td>						
								<select name ='txtCategoria'>
									<option>Selecione...</option>";
								 	foreach ($consulta as $usr) { 
										echo 
										"<option value='".$consulta[$num]['CODIGO']."'>".$consulta[$num]['NOME']."</option>";
										$num++;
									}
								echo 
								"</select>
							</td>";
						?>

					   <tr>
						   <td><label for="arqproduto">Imagem:</label></td>
						   <td collspan="3"><input type="file" name="arquivo" id="arquivo" /></td>
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