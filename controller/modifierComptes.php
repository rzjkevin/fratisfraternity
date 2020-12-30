<?php
	require('config.php');
	
	$idComptes = $_GET['idCompte'];
	
	$req = "SELECT cpt.id, c.Nom, c.prenom, c.email, cpt.Type, cpt.Solde, cpt.BanquierEnCharge, cpt.DateOuverture, cpt.DateFermeture, cpt.Commentaire, c.idDiscord, c.Emploie, c.telephone, c.Adresse, c.id as cliID 
			FROM compte cpt, clients c
			WHERE cpt.idClient = c.id
			AND cpt.Validite = '1'
			AND cpt.id = $idComptes 
			";

	$var = ($link->query($req))->fetch_all(MYSQLI_ASSOC);

	if(sizeof($var) < 1){
		$_SESSION['modificationCompte_error'] = "Le compte n'existe pas !"; 
		header('Location: ../accueil/modifier-comptes.php');
	}
	/*var_dump($var);*/

	if(isset($_POST['updateCompte'])) {

		$states = true; 
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$idDiscord = $_POST['idDiscord'];
		$metier = $_POST['metier'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
		$dateCreation = $_POST['datecreation'];
		$dateFin = $_POST['dateFin'];
		$typeEpargne = $_POST['typeEpargne'];
		$Commentaire = $_POST['commentaires'];

		$cliID = $_POST['cliID'];

		$req = "UPDATE clients 
		SET Nom = '$nom', Prenom = '$prenom', idDiscord = '$idDiscord', telephone = '$telephone', Emploie = '$metier', Adresse = '$adresse' 
		WHERE id = $cliID";	

		$var = $link->query($req);
		if($var == false){
			$states = false;
		}
		
		$req = "UPDATE compte 
		SET Type = '$typeEpargne', DateOuverture = '$dateCreation', DateFermeture = '$dateFin', Commentaire = '$Commentaire' 
		WHERE idClient = $idComptes";	

		$var = $link->query($req);
		if ($var == false) {
				$states = false;
		}
		if($states == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Modification du compte epargne $idClient";
			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);

			$_SESSION['modificationCompte_success'] = "Le compte a été modifié"; 
			/*header('Location: ../accueil/modifier-comptes_details.php?idCompte='.$idComptes);*/
		}else{
			$_SESSION['modificationCompte_error'] = "Le compte n'a pas pu être modifié"; 
			/*header('Location: ../accueil/modifier-comptes_details.php?idCompte='.$idComptes);*/
		}	
	}
?>	