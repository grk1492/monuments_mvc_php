<?php
	//session_start();
	require_once("../models/TypesiteModel.php");
	
	//récuperer la liste des typesites
	$ListeTypeSites = typesiteModel_findAll();
	
	//mettre en session la liste récupérée
	$_SESSION['ListeTypeSites'] = $ListeTypeSites;
	