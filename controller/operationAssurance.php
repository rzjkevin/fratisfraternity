<?php

	require('config.php');
	session_start();

	if(isset($_POST['creerAssuranceNouveau']) ) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$idDiscord = $_POST['idDiscord'];
		$metier = $_POST['metier'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
		$dateCreation = $_POST['datecreation'];
		$dateFin = $_POST['dateFin'];
		$frais = $_POST['frais'];
		$Commentaire = $_POST['commentaires'];

		$requete = "INSERT INTO `clients`(`Nom`, `Prenom`, `email`, `idDiscord`, `telephone`, `Emploie`, `Adresse`, `premium`, `dateDeCreation`) VALUES ('$nom', '$prenom', '$email', '$idDiscord', '$telephone', '$metier', '$adresse', 0, '$dateCreation')";
		$var = $link->query($requete);
		var_dump($var);

		$requete2 = "SELECT id FROM `clients` WHERE idDiscord = '$idDiscord'";
		$var1 = ($link->query($requete2))->fetch_all(MYSQLI_ASSOC);

		$idClient = $var1 ['0']['id'];
		$BanquierEnCharge = $_SESSION['nom'];

		$getAssurance = "SELECT * FROM `assurance` ORDER BY id DESC";
		$resGetAssurance = ($link->query($getAssurance))->fetch_all(MYSQLI_ASSOC);


		if(sizeof($resGetAssurance) >0){
			$nextId = $resGetAssurance[0]['id'] + 1;
		}else{
			$nextId = 1;
		}
		$bool = 1;

		$requete3 = "INSERT INTO assurance VALUES (".$nextId.", ".$idClient.", "."'".$dateCreation."', "."'".$dateFin."', ".$frais." ,".$bool.", "."'".$BanquierEnCharge."', "."'".$Commentaire."')";
		$var2 = $link->query($requete3);
		/*echo($requete3);
		var_dump($var2);*/

		if($var2 == true){

			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Création de l'assurance pour le client $idClient";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);

			$_SESSION['creationAssuranceNonCli_success'] = "Le compte a bien été créé !";
			header('Location: ../accueil/assurance.php');
		}else{
			$_SESSION['creationAssuranceNonCli_error'] = "Le compte n'a pas pu être créé !";
			header('Location: ../accueil/assurance.php');
		}
	}

	if(isset($_POST['creerAssuranceCli'])){
		$idClient = $_POST['client'];
		$frais = $_POST['frais'];
		$dateCreation = $_POST['datecreation'];
		$dateFin = $_POST['dateFin'];
		$Commentaire = $_POST['commentaires'];

		$getAssurance = "SELECT * FROM `assurance` ORDER BY id DESC";
		$resGetAssurance = ($link->query($getAssurance))->fetch_all(MYSQLI_ASSOC);

		$BanquierEnCharge = $_SESSION['nom'];
		
		if(sizeof($resGetAssurance) >0){
			$nextId = $resGetAssurance[0]['id'] + 1;
		}else{
			$nextId = 1;
		}
		$bool = 1;

		$requete3 = "INSERT INTO assurance VALUES (".$nextId.", ".$idClient.", "."'".$dateCreation."', "."'".$dateFin."', ".$frais." ,".$bool.", "."'".$BanquierEnCharge."', "."'".$Commentaire."')";
		$var2 = $link->query($requete3);


		if($var2 == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Création de l assurance pour le client $idClient";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);
			$_SESSION['creationAssuranceCli_success'] = "Le compte a bien été créé !";
			header('Location: ../accueil/assurance.php');
		}else{
			$_SESSION['creationAssuranceCli_error'] = "Le compte n'a pas pu être créé !";
			header('Location: ../accueil/assurance.php');
		}
	}

?>