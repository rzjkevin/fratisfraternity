<?php
	session_start();
	
	if(!isset($_SESSION['idEmploye'])){
		header('location: ../index.php');
	}
	require('config.php');
	
	if(isset($_POST['ajouter'])){
		$epargne = $_POST['typeEpargne'];
		$montant = $_POST['montant'];

		$requete2 = "SELECT id, solde, DernierAjout, DateDernierAjout FROM `compte` WHERE Type = '$epargne'";
		$var1 = ($link->query($requete2))->fetch_all(MYSQLI_ASSOC);

		$bool = false;

		var_dump($var1);

		foreach ($var1 as $compte) {
			$nouveauSolde = $compte['solde'] + $montant;
			$id = $compte['id'];
			$date_today = date('Y-m-d');
			//echo "$id - $nouveauSolde - $date_today <br>";

			$req = "UPDATE compte SET solde = $nouveauSolde, DateDernierAjout = '$date_today' WHERE id = $id";
			//echo($req);
			$var = $link->query($req);
			//var_dump($var);

			if($var == true){
				$bool = true;
			}else{
				$bool = false;
			}
		}

		if($bool == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Alimenter les comptes $epargne de $montant $";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);

			$_SESSION['epargne_alimenter-success'] = "Tous les comptes épargnes $epargne ont été crédités de $montant$";

		}else{
			$_SESSION['epargne_alimenter-error'] = "Tous les comptes épargnes $epargne n'ont pas été crédités de $montant$";
		}
		header('Location: ../accueil/alimenter-comptes.php');
	}

?>