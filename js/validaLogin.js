function validaLogin(){
	var login = document.getElementById('txtEmailLogin').value;
	var senha = document.getElementById("txtSenhaLogin").value;
if(login==""){
	alert("login em branco");
	return false;}
else if(senha==""){
	alert("senha em branco");
	return false;}
else
	return true;

} 