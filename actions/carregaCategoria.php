<?php
	require_once("../classes/Categoria.php");
	require_once("../dao/CategoriaDAO.php");

	$categoria = new Categoria();

	$categoria->codigo=$_GET["codigo"];
	
	$dao = new CategoriaDao();

	$carrega = $dao->consultaTudoCategoria($categoria);


	if($carrega){
		foreach ($carrega as $usr) {
			$categoria->nome = $usr["NOME"];
		}
	}	
?>