<?php
	session_start();

	echo "<script>
			window.open('../index.php','_top');
		</script>";

	session_destroy();	
?>