<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario</title>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<script type="text/javascript" src="../js/validaCadastroUsuario.js"></script>
</head>
<body>
<?php
	include("../actions/carregaUsuario.php");
?>

	<table id="formulario">	
		<tr>
			<div class="novocad">
				<td>
					<form method="post" action="../actions/atualizaAdministrador.php" novalidate onsubmit="return ../js/validaCadastroUsuario()">
						<input type="hidden" name="txtCodigo" value="<?=$usuario->codigo?>">
						<table class="recuo">
							<h1>Editar dados da conta</h1>
							<h2>Informações pessoais</h2>
							<tr>
								<td>
									<label>Nome*</label><br>
									<input type="text" size="40" value="<?=$usuario->nome?>" name="txtNome" id="txtNome">
								</td>
								<td>
									<label>Endereço de e-mail*</label><br>
									<input type="email" size="40" required value="<?=$usuario->email?>" name="txtEmail" id="txtEmail">
								</td>
							</tr>
							<tr>
								<td>
									<label>Sobrenome*</label><br>
									<input type="text" size="40" required value="<?=$usuario->sobrenome?>" name="txtSegundoNome" id="txtSegundoNome">
								</td> 
								<td>
									<label>Senha*</label><br>
									<input type="password" size="40" required value="<?=$usuario->senha?>" name="txtPassword" id="txtPassword">
								</td>
							</tr>
							<tr>
								<td>
									<table class="reverse">
										<tr>
											<td>
												<label>Sexo</label></label><br>
												<select name="txtSexo" id="txtSexo">
													<option value="m" <?php if($usuario->sexo == 'm'){ echo "selected";} ?>> Masculino</option>
													<option value="f" <?php if($usuario->sexo == 'f'){ echo "selected";} ?>> Feminino</option>
												</select>
											</td>
											<td>
												<label>Data de nascimento</label><br>
												<input type="date" value="<?=$usuario->dtNascimento?>" name="txtData" id="txtData">
											</td>
										</tr>
									</table>

								</td>
								<td>
									<label>Confirmar Senha*</label><br>
									<input type="password" size="40" required value="<?=$usuario->senha?>" name="txtConfirmaSenha" id="txtConfirmaSenha">
								</td>
							</tr>
							<tr>
								<td>
									<label>Telefone Celular*</label><br>
									<input type="text" size="40" required value="<?=$usuario->telefone?>" name="txtTelefone" id="txtTelefone">
								</td>
								<td>
							
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input class="submit" type="submit" value="Finalizar cadastro">
								</td>
							</tr>
						</table>
					</form>			
				</td>
			</div>
		</tr>
	</table>
</body>
</html>