<?php
	require('config.php');
	session_start();

	if(isset($_POST['creerPretNouveau'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$idDiscord = $_POST['idDiscord'];
		$metier = $_POST['metier'];
		$telephone = $_POST['telephone'];
		$adresse = $_POST['adresse'];
		$dateCreation = $_POST['datecreation'];
		$dateFin = $_POST['dateFin'];
		$sommeApreter = $_POST['sommePreter'];
		$sommeArendre = $_POST['sommeArendre'];

		$Commentaire = $_POST['commentaires'];


		$requete = "INSERT INTO `clients`(`Nom`, `Prenom`, `email`, `idDiscord`, `telephone`, `Emploie`, `Adresse`, `premium`, `dateDeCreation`) VALUES ('$nom', '$prenom', '$email', '$idDiscord', '$telephone', '$metier', '$adresse', 0, '$dateCreation')";
		$var = $link->query($requete);

		$requete2 = "SELECT id FROM `clients` WHERE idDiscord = '$idDiscord'";
		$var1 = ($link->query($requete2))->fetch_all(MYSQLI_ASSOC);

		$idClient = $var1 ['0']['id'];
		$BanquierEnCharge = $_SESSION['nom'];

		$getPret = "SELECT * FROM `pret` ORDER BY id DESC";
		$resGetPret = ($link->query($getPret))->fetch_all(MYSQLI_ASSOC);


		if(sizeof($resGetPret) >0){
			$nextId = $resGetPret[0]['id'] + 1;
		}else{
			$nextId = 1;
		}
		$bool = 1;

		$requete3 = "INSERT INTO pret VALUES (".$nextId.", ".$idClient.", "."'".$dateCreation."', "."'".$dateFin."', ".$sommeApreter.", ".$sommeArendre.", ".$bool.", "."'".$BanquierEnCharge."', "."'".$Commentaire."')";
		$var2 = $link->query($requete3);

		if($var2 == true){
			$_SESSION['creationAssuranceNonCli_success'] = "La demande de prêt a bien été créée !";
			header('Location: ../accueil/demande-pret.php');
		}else{
			$_SESSION['creationAssuranceNonCli_error'] = "La demande de prêt n'a pas pu être créée !";
			header('Location: ../accueil/demande-pret.php');
		}

	}

	if(isset($_POST['creerPretCli'])){
		$idClient = $_POST['client'];
		$sommeApreter = $_POST['sommePreter'];
		$sommeArendre = $_POST['sommeArendre'];

		$dateCreation = $_POST['datecreation'];
		$dateFin = $_POST['dateFin'];
		$Commentaire = $_POST['commentaires'];

		$getPret = "SELECT * FROM `pret` ORDER BY id DESC";
		$resGetPret = ($link->query($getPret))->fetch_all(MYSQLI_ASSOC);

		$BanquierEnCharge = $_SESSION['nom'];
		//var_dump($resGetPret);
		if(sizeof($resGetPret) >0){
			$nextId = $resGetPret[0]['id'] + 1;
		}else{
			$nextId = 1;
		}
		$bool = 1;

		$requete3 = "INSERT INTO pret VALUES (".$nextId.", ".$idClient.", "."'".$dateCreation."', "."'".$dateFin."', ".$sommeApreter.", ".$sommeArendre.", ".$bool.", "."'".$BanquierEnCharge."', "."'".$Commentaire."')";
		$var2 = $link->query($requete3);


		if($var2 == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Demande de prêt $nextId";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);

			$_SESSION['creationAssuranceNonCli_success'] = "Le compte a bien été créé !";
			header('Location: ../accueil/demande-pret.php');
		}else{
			$_SESSION['creationAssuranceNonCli_error'] = "Le compte n'a pas pu être créé !";
			header('Location: ../accueil/demande-pret.php');
		}
	}
?>