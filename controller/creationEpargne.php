<?php

	session_start();

	if(isset($_POST['creerCompteEpargne'])){
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$idDiscord = $_POST['idDiscord'];
		$metier = $_POST['metier'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
		$dateCreation = $_POST['datecreation'];
		
		$typeEpargne = $_POST['typeEpargne'];
		$Commentaire = $_POST['commentaires'];
		
		if(isset($_POST['dateFin'])){
			$dateFin = $_POST['dateFin'];
		}else{
			$dateFin = "N/A";
		}

		require('config.php');


		$requete = "INSERT INTO `clients`(`Nom`, `Prenom`, `email`, `idDiscord`, `telephone`, `Emploie`, `Adresse`, `premium`, `dateDeCreation`) VALUES ('$nom', '$prenom', '$email', '$idDiscord', '$telephone', '$metier', '$adresse', 0, '$dateCreation')";

		$var = $link->query($requete);

		
		//var_dump($var);

		$requete2 = "SELECT id FROM `clients` WHERE idDiscord = '$idDiscord'";
		//var_dump($requete2);
		$var = ($link->query($requete2))->fetch_all(MYSQLI_ASSOC);
		/*var_dump($var);*/


		$idClient = $var ['0']['id'];
		
		if($typeEpargne == 'bronze'){
			$solde = 2000;
		}elseif ($typeEpargne == 'gold') {
			$solde = 4000;
		}elseif ($typeEpargne == 'diamant') {
			$solde = 8000;
		}elseif ($typeEpargne == 'fraise') {
			$solde = 10000;
		}elseif ($typeEpargne == 'entreprise') {
			$solde = 10000;
		}

		$BanquierEnCharge = $_SESSION['nom'];
		/*var_dump($solde);*/ 
		
		$getClients = "SELECT * FROM `compte` ORDER BY id DESC";
		$resGetClients = ($link->query($getClients))->fetch_all(MYSQLI_ASSOC);

		//var_dump($resGetClients);

		if(sizeof($resGetClients) >0){
			$nextId = $resGetClients[0]['id'] + 1;
		}else{
			$nextId = 1;
		}

		/*Vérifier si le client rentrer */

		$requete3 = "INSERT INTO `compte` VALUES ($nextId, $idClient, '$typeEpargne', '$dateCreation', '$dateFin', '$solde', '$solde', '$dateCreation', 1, '$BanquierEnCharge', '$Commentaire')";

		var_dump($requete3);
		$req = $link->query($requete3);
		var_dump($req);

		if($req == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Création du compte epargne $nextId";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);

			$_SESSION['creationEpargne_success'] = "Le compte a bien été créé !";
			header('Location: ../accueil/accueil.php');
		}else{
			$_SESSION['creationEpargne_error'] = "Le compte n'a pas pu être créé !";
			header('Location: ../accueil/accueil.php');
		}

	}

?>