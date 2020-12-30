<?php

	require('config.php');
	/*session_start();*/
	$req = "SELECT s.idEmploye, s.dateAction, s.actions, e.Nom, e.Prenom
			FROM suivieemploye s, employe e
			WHERE s.idEmploye = e.id
			ORDER BY s.id DESC
			";	

	$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC); 

?>