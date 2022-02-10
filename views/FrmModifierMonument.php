
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
		<title>Modifier monument</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
        <link rel="stylesheet" href="../css/w3.css" />
        <link rel="stylesheet" href="../css/main.css" />
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<script src=""></script>
        <script type="text/javascript">
        </script>	
		<?php 
			session_start(); 
			//récuperation du message_erreur
			$message_erreur = $_SESSION['message_erreur'];
			require_once("../controllers/TypesiteListerMonumentInit.php");
			if (isset($_SESSION['monumentTrouve']) ){
				$monument = $_SESSION['monumentTrouve'];
				$vNomMonument = $monument['nom'];
				$vAdresseMonument = $monument['adresse'];
				$vTypeMonument = $monument['id_typesite'];
				$vIdMonument = $monument['id_monument'];
				$optionChoisi = "selected";
			} else {
				$vNomMonument = "";
				$vAdresseMonument = "";
				$vTypeMonument = "";						
			}			
		?>
	</head>
	<body>
		<div class="w3-container ">
			
			<div class="w3-card-4" id="zoneFormulaire">
				<div class="w3-container w3-blue">
				  <h1>Modifier un monument</h1>
				</div>
				<br>
				<div  class="w3-container w3-text-red">
					<?php echo $message_erreur; ?>
				</div>
				<form class="w3-container" action="../controllers/monumentModifierAccept.php" method="POST">

					<p>
						<input class="w3-input" type="hidden" id="idIdMonument" name="idMonument" value="<?php echo $vIdMonument; ?>" >

						<label for="idnomMonument">Nom :</label>
						<input class="w3-input" type="text" id="idnomMonument" name="nomMonument" value="<?php echo $vNomMonument; ?>" placeholder="Saisir nom monument" required autofocus>
					</p>
					<p>
						<label for="idadresseMonument">Adresse :</label>
						<input class="w3-input" type="text" id="idadresseMonument" name="adresseMonument" value="<?php echo $vAdresseMonument; ?>" placeholder="Saisir adresse monument"  >
					</p>
					<p>
						<label for="idtypeMonument">Type :</label>
						<select id="idtypeMonument" name="typeMonument" class="w3-input" >
							<option></option>
							<?php foreach ($ListeTypeSites as $untypesite){ ?>
							<option value="<?php echo $untypesite['id_typesite']; ?>" 
								<?php if ($untypesite['id_typesite']== $vTypeMonument) { echo $optionChoisi; }?>
							><?php echo $untypesite['libelle']; ?>
							</option>
							<?php } ?>
						</select>						
					</p>
					<div class="w3-container w3-right-align">
						<p>
							<button class="w3-btn w3-teal" type="submit">Valider</button>
						</p>
					</div>
				</form>
				<br><br>
				<div class="w3-container w3-black w3-left-align">
					<p>
						<a href="../controllers/MonumentListerInit.php" ><button class="w3-btn w3-xlarge w3-green">Liste des monuments</button></a></p>
					</p>
				</div>					
			</div>
		</div>
	</body>
</html>
