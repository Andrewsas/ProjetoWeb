<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		
		require_once("../classes/Mensagem.php");
		require_once("../dao/MensagemDao.php");

		$mensagem = new  Mensagem();

		$mensagem->email=$_POST["txtEmail"];
		$mensagem->descricao=$_POST["txtDescricao"];
		
		$dao = new MensagemDao();
		$inseriu = $dao->cadastraMensagem($mensagem);

		if($inseriu){
			$num = 0;
			
			foreach ($inseriu as $usr) {
				echo "<script>alert('".$inseriu[$num]['MENSAGEM']."');</script>";
				echo 
					"<script>
						window.open('../forms/formCadastroMensagem.html','_self');
					</script>"; 
				$num++;
			}	
		}
	?>	
</body>
</html>
