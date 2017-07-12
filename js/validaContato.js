function validaCurriculo() {
			var nome = document.getElementById('txtNome').value;
			var email = document.getElementById('txtEmail').value;
			var descricao = document.getElementById('txtDescricao').value;
			
			if(nome==""){
				alert("Iforme seu nome");
				return false;
			}
			else if(email==""){
				alert("Iforme seu email");
				return false;
			}
			else if(descricao==""){
				alert("Deixe sua critica ou sugestão");
				return false;
			}
			else
				return true;
		}	