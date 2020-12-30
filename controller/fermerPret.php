<?php
	session_start();

	require('config.php');
	
	$id = $_GET['idCompte'];
	$req = "UPDATE pret SET Validite = 0 WHERE id = $id";

	$var = $link->query($req);
	/*var_dump($var);*/

	if($var == false){
		$_SESSION['epargneF_error'] = "Le pret n'a pas été clôturer";
	}else{
		$id = $_SESSION['idEmploye'];
		$dateAction = date('Y-m-d');
		$cpt = $_GET['idCompte'];
		$action ="Création du prêt $cpt";
		$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
		$res = $link->query($req);

		$_SESSION['epargneF_success'] = "Le comtpe a été clôturer";
	}
	header('Location: ../accueil/fermer-pret.php');

?>