function validaCurriculo() {
	nome = getElementById('txtNome').value;
	email = getElementById('txtEmail').value;
	descricao = getElementById('txtDescricao').value;

	if(nome=="")
		alert("Iforme seu nome");
	else if(email=="")
		alert("Iforme seu email");
	else if(descricao=="")
		alert("Iforme o modivo de querer trabalhar conosco");
	else
		return true;
	return false;
}