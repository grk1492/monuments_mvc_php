<?php
	
	session_start();
	require_once("../models/MonumentModel.php");
	
	//réception des données postées
	$vNomMonument = $_POST['nomMonument'];
	$vAdresseMonument = $_POST['adresseMonument'];
	$vTypeMonument = $_POST['typeMonument'];
	$vIdMonument = $_POST['idMonument'];

	//on remet en 
	//variable de session les données reçues
	$_SESSION['NomMonument'] = $vNomMonument;
	$_SESSION['AdresseMonument'] = $vAdresseMonument;
	$_SESSION['TypeMonument'] = $vTypeMonument;
	$_SESSION['IdMonument'] = $vIdMonument;
	$oldMonument = $_SESSION['oldMonument'];
	$_SESSION['message_erreur'] = "";
	
	//controle des données saisie
	if ($vNomMonument <> "" and $vAdresseMonument <> "" and $vTypeMonument <> ""){
		//controle de la modification
		if ( $oldMonument['NOM']==$vNomMonument  and $oldMonument['ADRESSE']== $vAdresseMonument and $oldMonument['ID_TYPESITE'] == $vTypeMonument) {
			// aucune modification effectuée
			$_SESSION['message_erreur'] = "Aucune modification effectuée";
			Header("Location: ../views/frmModifierMonument.php");	
		} else {
			// modification effectuée
			monumentModel_Update( $vIdMonument, $vNomMonument, $vAdresseMonument, $vTypeMonument  );
			//redirection vers la page qui effectue l'insertion
			Header("Location: ../controllers/MonumentListerInit.php");		
		}
	} else {
		//la saisie est incorrecte 
		//redirection vers le formulaire
		$_SESSION['message_erreur'] = "Erreur dans la saisie";
		Header("Location: ../views/frmModifierMonument.php");
	}
	
?>