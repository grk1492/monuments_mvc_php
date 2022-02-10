<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Gestion des monuments</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/main.css" />
		<?php 
			session_start();
		?>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<h1 style="color:white;">Erreur technique</h1>
				</div>
			</div>
		</nav>		
		<div id="zoneErreur" class="container">
			<header>
				<h2 class="titre">Message</h2>
			</header>
			<br>
			<div class="form-group">
				<p style="background-color: brown; font-weight: bold;color: yellow;resize: none;text-align: left;">
					<?php 
						echo $_SESSION['message_erreur'];
						session_destroy();
						exit();
					?>
				</p>	
			</div>			
		<div >	
	</body>
</html>
