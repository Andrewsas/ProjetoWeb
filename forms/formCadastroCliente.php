<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro Adimistrador</title>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css">
	<script type="text/javascript" src="../js/validaCadastroUsuario.js"></script>
	<script type="text/javascript" src="../js/validaLogin.js"></script>
</head>
<body>
	<table id="formulario">	
		<tr>
			<div class="novocad">
				<td>
					<form method="post" action="../actions/cadastraCliente.php" novalidate onsubmit="return validaCadastroUsuario()">
						<table class="recuo">
							<h1>Criar uma nova conta</h1>
							<h2>Informações pessoais</h2>
							<tr>
								<td>
									<label>Nome*</label><br>
									<input type="text" size="40" required name="txtNome" id="txtNome">
								</td>
								<td>
									<label>Endereço de e-mail*</label><br>
									<input type="email" size="40" required name="txtEmail" id="txtEmail">
								</td>
							</tr>
							<tr>
								<td>
									<label>Sobrenome*</label><br>
									<input type="text" size="40" required name="txtSegundoNome" id="txtSegundoNome">
								</td>
								<td>
									<label>Senha*</label><br>
									<input type="password" size="40" required name="txtPassword" id="txtPassword">
								</td>
							</tr>
							<tr>
								<td>
									<table class="reverse">
										<tr>
											<td>
												<label>Sexo</label></label><br>
												<select name="txtSexo" id="txtSexo">
													<option value="m" selected>Masculino</option>
													<option value="f" >Feminino</option>
												</select>
											</td>
											<td>
												<label>Data de nascimento</label><br>
												<input type="date" name="txtData" id="txtData">
											</td>
										</tr>
									</table>

								</td>
								<td>
									<label>Confirmar Senha*</label><br>
									<input type="password" size="40" required id="txtConfirmaSenha">
								</td>
							</tr>
							<tr>
								<td>
									<label>Telefone Celular*</label><br>
									<input type="text" size="40" required name="txtTelefone" id="txtTelefone">
								</td>
								<td>
									<input class="float" type="checkbox">
									<label> Aceito receber e-mails</label>
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