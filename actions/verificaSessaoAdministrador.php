<?php
	session_start();

	if(!isset($_SESSION["usutipo"]) || $_SESSION["usutipo"] != "administrador" ){
	
			 echo "<script>
					  alert('Você não tem acesso a essa página!')  ;
					  window.open('home.html', '_self');
				  </script>"    ;
	}
?>