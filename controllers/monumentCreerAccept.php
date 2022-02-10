<?php
	
	session_start();
	require_once("../models/MonumentModel.php");
	
	//réception des données postées
	$vNomMonument = $_POST['nomMonument'];
	$vAdresseMonument = $_POST['adresseMonument'];
	$vTypeMonument = $_POST['typeMonument'];

	//on remet en 
	//variable de session les données reçues
	$_SESSION['NomMonument'] = $vNomMonument;
	$_SESSION['AdresseMonument'] = $vAdresseMonument;
	$_SESSION['TypeMonument'] = $vTypeMonument;
	
	//controle des données saisie
	if ($vNomMonument != "" and $vAdresseMonument != "" and $vTypeMonument != ""){
		//appel de la fonction qui effectue l'insertion
		monumentModel_Insert( $vNomMonument, $vAdresseMonument, $vTypeMonument  );
		Header("Location: ../controllers/MonumentListerInit.php");		
	} else {
		//la saisie est incorrecte 
		//redirection vers le formulaire
		$_SESSION['message_erreur'] = "Erreur dans la saisie";
		Header("Location: ../views/frmAjouterMonument.php");
	}
	
?>