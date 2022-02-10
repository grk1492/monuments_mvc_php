<?php
	
	require_once("../models/typeSiteFindAll.php");
	//session_start();
	
	//récuperer la liste des typesites
	$ListeTypeSites = typesiteModel_findAll();
	
	//mettre en session la liste récupérée
	$_SESSION['ListeTypeSites'] = $ListeTypeSites;
	//Header("Location: ../views/MonumentVoir.php");
	
?>