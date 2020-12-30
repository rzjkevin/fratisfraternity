<?php
	/*session_start();*/
	require('config.php');
	
	$req = "SELECT a.id, c.Nom, c.prenom, c.email, a.commentaire, a.DateOuverture, a.BanquierEnCharge, a.DateFermeture 
			FROM assurance a, clients c
			WHERE a.idClient = c.id
			AND a.Validite = '1'
			ORDER BY a.id ASC
			";

	$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);
/*	var_dump($var);

	foreach ($var as $key) {
		echo($key['id'].'<br>');
	}*/
?>