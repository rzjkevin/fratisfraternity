<?php
	/*session_start();*/

	require('config.php');
	
	$req = "SELECT cpt.id, c.Nom, c.prenom, c.email, cpt.Type, cpt.Solde, cpt.DateOuverture, cpt.DateFermeture 
			FROM compte cpt, clients c
			WHERE cpt.idClient = c.id
			AND cpt.Validite = '1'
			ORDER BY cpt.id ASC
			";

	$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);
/*	var_dump($var);

	foreach ($var as $key) {
		echo($key['id'].'<br>');
	}*/
?>