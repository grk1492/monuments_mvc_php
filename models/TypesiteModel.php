<?php

	require_once("Connexion.php");
	
	function typesiteModel_findAll(){

		$message_erreur = "";

		// initialiser $ListeMonuments
		$ListeTypeSites = array();
		
		try{
			
			//exécution de la fonction connect_db()
			$connexion = connect_db();	
	
			//préparation de la requête
			$sql = "select * from typesite;";
		
			//exécution de la requete	
			$ListeTypeSites = $connexion->query($sql)->fetchAll();

		}	
		catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: ../views/PageErreur.php" );
		}			

		//fermer la connexion
		$connexion = null;
		
		//le tableau $ListeTypeSites est retourné
		return $ListeTypeSites;
			
	}
	

?>