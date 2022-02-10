<?php

	//session_start();

	function connect_db(){
		// --------------------------------------------------------------
		// Connection à la Base de Données (via PDO)
		$pdo_hostname = 'localhost'; // voir hébergeur ou "localhost" en local
		$pdo_database = 'monumentdb'; // nom de la BdD
		$pdo_username = 'root'; // identifiant "root" en local
		$pdo_password = ''; // mot de passe (vide en local)
	
		// ------------------------
		$message_erreur = "";
		//$message_cnx = "";
		$connexion = null;
		
		try {
			$pdo_connect_bd = 'mysql:host='.$pdo_hostname.';dbname='.$pdo_database.'';
			$pdo_extra_params = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // encodage UTF-8
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // rapport d'erreurs sous forme d'exceptions
				PDO::ATTR_PERSISTENT => true, // Connexions persistantes
			);
			$connexion = new PDO($pdo_connect_bd, $pdo_username, $pdo_password, $pdo_extra_params); // instancie la connexion
			//$message_cnx = "Connexion réussie !";
		}
		catch(PDOException $e) {
			$message_erreur = "ERREUR PDO dans " . $e->getFile() . " <br>Ligne " . $e->getLine() . " : " . $e->getMessage() . "<br>";
			$_SESSION['message_erreur'] = $message_erreur;
			//$message_cnx = "Connexion échouée !";
			Header("Location: ../views/PageErreur.php");
		}
		
		$_SESSION['message_erreur'] = $message_erreur;
		//$_SESSION['message_cnx'] = $message_cnx;
	
		// --------------------------------------------------------------
		return $connexion;
	}	
?>