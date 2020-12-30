<?php
require('config.php');
	session_start();

if(isset($_POST['modifier'])){
		$intitule = $_POST['banque'];
		$operation = $_POST['operation'];
		$montant = $_POST['montant'];

		//echo "$intitule - $operation - $montant";

		if($operation == 'update'){
			if ($intitule == 'coffre') {
				
				$req = "UPDATE banqueCompte SET somme = $montant WHERE id = 1";
				$var = $link->query($req);

			}elseif ($intitule == 'impots') {
				$req = "UPDATE banqueCompte SET somme = $montant WHERE id = 2";
				$var = $link->query($req);				
			}
		}elseif ($operation == 'credit') {
			if ($intitule == 'coffre') {
				$req = "SELECT somme FROM banqueCompte WHERE intitule = 'coffre'";
				$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);

				$new_solde = $var[0]['somme'] + $montant;
				$req = "UPDATE banqueCompte SET somme = $new_solde WHERE id = 1";
				$var = $link->query($req);			
			}elseif ($intitule == 'impots') {
				$req = "SELECT somme FROM banqueCompte WHERE intitule = 'impots'";
				$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);

				$new_solde = $var[0]['somme'] + $montant;
				$req = "UPDATE banqueCompte SET somme = $new_solde WHERE id = 2";
				$var = $link->query($req);
			}
		}elseif ($operation == 'debit') {
			if ($intitule == 'coffre') {
				$req = "SELECT somme FROM banqueCompte WHERE intitule = 'coffre'";
				$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);

				$new_solde = $var[0]['somme'] - $montant;
				$req = "UPDATE banqueCompte SET somme = $new_solde WHERE id = 1";
				$var = $link->query($req);		
			}elseif ($intitule == 'impots') {
				$req = "SELECT somme FROM banqueCompte WHERE intitule = 'impots'";
				$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);

				$new_solde = $var[0]['somme'] - $montant;
				$req = "UPDATE banqueCompte SET somme = $new_solde WHERE id = 2";
				$var = $link->query($req);
			}
		}

		if($var == true){
			$_SESSION['operation-success'] = "L'opération a été faite !";

		}else{
			$_SESSION['operation-error'] = "L'opération n'a pas aboutie !";
		}

		header('Location: ../accueil/banque.php');

	}

?>