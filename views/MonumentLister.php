
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
		<title>Gestion des monuments</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
        <link rel="stylesheet" href="../css/main.css" />
		<script src=""></script>
        <script type="text/javascript">
        </script>	
		<?php
			session_start();
			$ListeMonuments = $_SESSION['ListeMonuments'];
		?>
	</head>
	<body>
		<div class="w3-bar w3-brown">
			<div class="w3-bar-item">
				<h1>GESTION DES MONUMENTS</h1>
			</div>
		</div>
		<div class="w3-container">
			<br>
			<header>
				<h2 class="w3-center titre">Liste des bénéficiaires </h2>
			</header>			
			<table class="w3-table w3-border w3-striped w3-hoverable tblDimension">

				<thead>
					<tr>
						<!--<th>ID</th>-->
						<th>NOM</th>
						<th>ADRESSE</th>
						<th>TYPE MONUMENT</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($ListeMonuments as $unmonument)
						{
					?>
					<tr>
						<!--<td><?php echo $unmonument['id_monument'];?></td>-->
						<td><?php echo $unmonument['nom'];?></td>
						<td><?php echo $unmonument['adresse'];?></td>
						<td><?php echo $unmonument['libelle'];?></td>
						<td class="w3-center colBtn">			
							<a href="../controllers/MonumentVoirInit.php?id=<?php echo $unmonument['id_monument'];?>" ><button class="w3-btn w3-green btnTableau">Voir</button></a>
							<a href="../controllers/monumentModifierInit.php?id=<?php echo $unmonument['id_monument'];?>" ><button class="w3-btn w3-blue btnTableau">Modifier</button></a>
							<a href="../controllers/monumentSupprimerInit.php?id=<?php echo $unmonument['id_monument'];?>" ><button class="w3-btn w3-red btnTableau">Supprimer</button></a>
						</td>
					</tr>
						<?php } ?>
				</tbody>
			</table>
			<footer>
				<a href="FrmAjouterMonument.php" ><button id="btnCreer" class="w3-btn w3-xlarge w3-blue">Ajouter</button></a>
			</footer>
		</div>
	</body>
</html>
