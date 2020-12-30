<?php
		require('config.php');
	
	$req = "SELECT * FROM employe";

	$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);
?>