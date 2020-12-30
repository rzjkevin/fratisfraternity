<?php
	/*session_start();*/
	require('config.php');
	
	$req = "SELECT p.id, c.Nom, c.prenom, c.email, p.commentaire, p.DateOuverture, p.BanquierEnCharge, p.DateFermeture, p.MontantPret, p.MontantArendre 
			FROM pret p, clients c
			WHERE p.idClient = c.id
			AND p.Validite = '1'
			ORDER BY p.id ASC
			";

	$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);
/*	var_dump($var);

	foreach ($var as $key) {
		echo($key['id'].'<br>');
	}*/
?>