function validaMSG() {
	var nome = document.getElementById('txtNome').value;
	var email = document.getElementById('txtEmail').value;
	var descricao = document.getElementById('txtDescricao').value;

	if(nome==""){
		alert("Informe seu nome");
		return false;}
	else if(email==""){
		alert("Informe seu email");
		return false;}
	else if(descricao==""){
		alert("Informe o motivo de querer trabalhar conosco");
		return false;}
	else
		return true;
}