<?php
	
	session_start();
	
	//injection de MonumentModel.php
	require_once("../models/MonumentModel.php");
	
	//récupération de la liste des monuments à travers 
	// la fonction monumentModel_findAll()
	$ListeMonuments = monumentModel_FindAll();
	
	//mettre $ListeMonuments en variable de session
	$_SESSION['ListeMonuments'] = $ListeMonuments;
	
	//redirection vers MonumentLister.php
	Header("Location: ../views/MonumentLister.php");
	
?>