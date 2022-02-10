<?php
	
	session_start();
	require_once("../models/MonumentModel.php");

	//réception de l'id monument
	$id = $_GET['id'];
	
	//récupere le monument cherche par son id
	$monumentTrouve = monumentModel_DeleteById($id);
	Header("Location: ../views/FrmSupprimerMonument.php");
	
?>