<?php
	
	session_start();
	require_once("../models/MonumentModel.php");

	//réception de l'id monument
	$id = $_GET['id'];
	
	//récupere le monument cherche par son id
	$monumentTrouve = monumentModel_FindById($id);
	
	Header("Location: ../views/MonumentVoir.php");
	
?>