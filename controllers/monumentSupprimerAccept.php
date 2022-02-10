<?php
	session_start();
	require_once("../models/MonumentModel.php");
    //réception de id monument
    
	$vIdMonument = $_POST['idMonument'];
     monumentModel_DeleteById($vIdMonument);
	 Header("Location: ../controllers/MonumentListerInit.php");


