<?php

	require('config.php');
	session_start();

	if(isset($_POST['creerEmploye'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$grade = $_POST['grade'];
		$phone = $_POST['telephone'];
		$dateCreation = date('Y-m-d');
		$password = $_POST['password'];


		$req = "INSERT INTO employe (Nom, Prenom, email, grade, dateDeCreation,telephone, motdepasse) VALUES ('$nom', '$prenom', '$email', '$grade', '$dateCreation', '$phone', '$password')";
		$res = $link->query($req);

		var_dump($res);

		if($res == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$action ="Création du compte employe $nom $prenom";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);
			$_SESSION['operation-success'] = "Le compte a été créé !";

		}else{
			$_SESSION['operation-error'] = "Le compte n'a pas été créé !";
		}

		header('Location: ../accueil/employe.php');
	}

	if(isset($_POST['fermer'])){
		$id = $_POST['idCompte'];

		$req = "DELETE FROM employe WHERE id = $id";

		$res = $link->query($req);

		if($res == true){
			$id = $_SESSION['idEmploye'];
			$dateAction = date('Y-m-d');
			$cpt = $_POST['idCompte'];
			$action ="Fermeture du compte employe $cpt";

			$req = "INSERT INTO suivieemploye (idEmploye, dateAction, actions) VALUES ($id, '$dateAction', '$action')";
			$res = $link->query($req);
			$_SESSION['operation-success'] = "Le compte a été supprimer !";

		}else{
			$_SESSION['operation-error'] = "Le compte n'a pas été supprimé !";
		}

		header('Location: ../accueil/employe.php');

	}
?>