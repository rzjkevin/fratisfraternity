<?php
	require('config.php');
	session_start();

	
		$id = $_SESSION['idEmploye'];
		$dateAction = date('Y-m-d');
		$action ="test";

		$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
		$res = $link->query($req);
		
		var_dump($res);
		

?>