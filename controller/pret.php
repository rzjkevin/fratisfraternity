<?php 

	require('config.php');
	/*session_start();*/
	$req = "SELECT * FROM clients";	

	$res = ($link->query($req))->fetch_all(MYSQLI_ASSOC);

	
?>