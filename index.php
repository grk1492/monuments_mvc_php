<?php
	session_unset();
	session_destroy();
	Header("Location: ./controllers/MonumentListerInit.php");
	
?>