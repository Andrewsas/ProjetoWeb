<?php
	session_start();

	if(!isset($_SESSION["logado"]) || $_SESSION["logado"] != true ){
	
			 echo "<script>
					  alert('E necessario login para acessar essa parte do site !')  ;
					  window.open('forms/formLogin.php', '_self');
				  </script>"    ;
	}

?>