<?php

	require_once("Connexion.php");
	
	function monumentModel_FindAll(){

		$message_erreur = "";

		// initialiser $ListeMonuments
		$ListeMonuments = array();
		
		try{
			//connexion à la bdd avec la fonction connect_db()
			$maconnexion = connect_db();
	
			//préparation de la requete sql
			$sql = "select m.id_monument, m.nom, m.adresse, m.id_typesite, t.libelle from monument m, typesite t " .
				"where m.id_typesite = t.id_typesite";
	         $stmt  = $maconnexion->prepare($sql);
			//exécution pour la récupération de la liste des monuments 
			$stmt->execute();
			$ListeMonuments = $stmt->fetchAll();
			$stmt->closeCursor();
		}	
		catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: ../views/PageErreur.php" );
		}			

		//fermer la connexion
		$maconnexion = null;
		
		//le tableau $ListeMonuments est retourné
		return $ListeMonuments;
			
	}
	
	function monumentModel_FindById( $id ){

		$message_erreur = "";
		$message_traitement = "";
		
		//initilisation de $monumentTrouve
		$monumentTrouve = null;

		//on assainit la variable $id
		$vsId = filter_var($id,FILTER_SANITIZE_SPECIAL_CHARS);

		try {
			//exécution de la fonction connect_db()
			$connexion = connect_db();	
	
			//préparation de la requête
			$sql = "select * from monument where id_monument = :vsId";
			
			//on prepare la requete
			$stmt = $connexion->prepare($sql);
			
			//binding des params en fonction de son type
			$stmt->bindParam(":vsId",$vsId, PDO::PARAM_INT);

			//on execute le stmt
			$stmt->execute();
			
			//exécution de la requete
			$reponse = $stmt->fetchAll();
			$stmt->closeCursor();

			//extraction du monument trouvé
			if ( sizeof($reponse) < 1) {
				$_SESSION['message_traitement'] = "Monument inexistant !";
			} else {
				foreach ($reponse as $unmonument){
						$monumentTrouve = $unmonument;
				}
				
				//mettre en session $monumentTrouve
				$_SESSION['monumentTrouve'] = $monumentTrouve;
			}
		} 
		catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: ../views/PageErreur.php" );
		}			
			
		//fermeture de la connexion
		$connexion=null;
		
		//retour de la reponse
		return $monumentTrouve;		
		
	}

	function monumentModel_Insert( $vNomMonument, $vAdresseMonument, $vTypeMonument  ) {
		
		$message_erreur = "";
		$message_traitement = "";
		$vNomMonument = filter_var($vNomMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vAdresseMonument = filter_var($vAdresseMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vTypeMonument = filter_var($vTypeMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			
		// preparation requête sql 
		//$sql = "insert into monument (nom,adresse,typesite) values (NULL,:vNomMonument,vAdresseMonument,vTypeMonument)";
		
		try{

			$sql = "insert into monument values (NULL,:vNomMonument,:vAdresseMonument,:vTypeMonument)";
			//exécution de la fonction connect_db()
			$connexion = connect_db();	
			$stmt = $connexion->prepare($sql);
			$stmt->bindParam(":vNomMonument",$vNomMonument, PDO::PARAM_STR);
			$stmt->bindParam(":vAdresseMonument",$vAdresseMonument, PDO::PARAM_STR);
			$stmt->bindParam(":vTypeMonument",$vTypeMonument, PDO::PARAM_STR);

			//exécution de la requête
			$stmt->execute();
			$stmt->closeCursor();
			
			
			$_SESSION['message_traitement'] = "Création effectuée avec succès";
		}	
		catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			$_SESSION['message_traitement'] = "Echec de la création";

			Header("Location: ../../views/PageErreur.php" );
		}		
		$connexion = null;		
	}

	function monumentModel_Update( $vIdMonument, $vNomMonument, $vAdresseMonument, $vTypeMonument  ) {
		
		$message_erreur = "";
		$message_traitement = "";
		$vIdMonument = filter_var($vIdMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vNomMonument = filter_var($vNomMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vAdresseMonument = filter_var($vAdresseMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vTypeMonument = filter_var($vTypeMonument,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		// preparation requête sql 
	

	
		
		try{
			//exécution de la fonction connect_db()
			$connexion = connect_db();

			//preparation de la requête	
			$sql = "update monument set nom = :vNomMonument, adresse = :vAdresseMonument, id_typesite = :vTypeMonument  WHERE id_monument = :vIdMonument"; 
			
			// preparation requête sql 
			$stmt = $connexion->prepare($sql);
			//binding des params
			$stmt->bindParam(":vNomMonument",$vNomMonument, PDO::PARAM_STR);
			$stmt->bindParam(":vAdresseMonument",$vAdresseMonument, PDO::PARAM_STR);
			$stmt->bindParam(":vTypeMonument",$vTypeMonument, PDO::PARAM_STR);
			$stmt->bindParam(":vIdMonument",$vIdMonument, PDO::PARAM_INT);
            
            //exécution de la requête
			$stmt->execute();
			$stmt->closeCursor();
			$_SESSION['message_traitement'] = "Modification effectuée avec succès";
		}	
		catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			$_SESSION['message_traitement'] = "Echec de la modification";

			Header("Location: ../../views/PageErreur.php" );
		}	
		//return $ListeMonuments;

		$connexion = null;		
	}

	

	function monumentModel_DeleteById( $id ){

		$message_erreur = "";
		$vsId = filter_var($id,FILTER_SANITIZE_SPECIAL_CHARS);
		
		try {

			//1 On store la conn dans une variable
			$connexion = connect_db();	
			//2 On defini la requete
			$sql = "delete from monument where id_monument = :vsId";
			//3 On prepare la requete
			$stmt = $connexion->prepare($sql);
			//4 On bind les params
			$stmt->bindParam(":vsId",$vsId, PDO::PARAM_INT);
			//5 On execute la requete 
			$stmt->execute();
			//6 On close la requete
			$stmt->closeCursor();
			
		} 
		catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: ../views/PageErreur.php" );
		}			
			
		  //fermeture de la connexion
		  $connexion=null;
	
		
	}