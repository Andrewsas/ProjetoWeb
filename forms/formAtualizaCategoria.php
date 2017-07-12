<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<script type="text/javascript" src="../js/validaCadastroCategoria.js"></script>
	<title>Upload de arquivos</title>	
</head>
<body>
	<?php include("../actions/carregaCategoria.php"); ?>

	<table id="formularioupload">	
		<tr>
			<div class="novocad">
				<td>
				<form method="post" enctype="multipart/form-data" action="../actions/atualizaCategoria.php" onsubmit="return validaCadastroCategoria()">
					<input type="hidden" name="txtCodigo" value="<?=$categoria->codigo?>">
				   	<table class="recuo">
						<tr>
							<th colspan="2"><h2>Dados da Categoria</h2></th>
						<tr>
					   	
					   	<tr>
							<td><label for="txtNome">Nome:</label></td>
							<td><input type="text" name="txtNome" id="txtNome" size="50px" value="<?=$categoria->nome?>"></td>
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
