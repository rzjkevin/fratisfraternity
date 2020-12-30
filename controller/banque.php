<?php

	require('config.php');
	/*session_start();*/
	$req = "SELECT * FROM banqueCompte";	

	$res = ($link->query($req))->fetch_all(MYSQLI_ASSOC); 

?>