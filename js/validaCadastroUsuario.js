function validaCadastroUsuario() {
	var nome = document.getElementById('txtNome').value;
	var email = document.getElementById("txtEmail").value;
	var segundonome = document.getElementById('txtSegundoNome').value;
	var senha = document.getElementById('txtPassword').value;
	var confirmasenha = document.getElementById('txtConfirmaSenha').value;
	var telefone = document.getElementById('txtTelefone').value;
	var datadtnascimento = document.getElementById('txtData').value;
	//var contasenha = senha.length;
	
	if(nome==""){
		alert("Informe o nome");
		return false;}
	else if(email==""){
		alert("Informe seu email");
		return false;}
	else if(segundonome==""){
		alert("Informe seu Sobrenome");
		return false;}
	else if (senha==""){
		alert("Campo Senha em Branco")
		return false;
	}
	else if(confirmasenha==""){
		alert("Campo Confimar Senha em Branco");
		return false;}
	else if	(confirmasenha != senha){
		alert("As senhas não conferem!");
		return false;}
	else if(datadtnascimento==""){
		alert("Campo data de em Branco")
		return false;
	}
	else if(telefone==""){
		alert("Campo telefone em Branco");
		return false;
	}	
	else 
		return true;
}