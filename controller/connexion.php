<?php
	
	if (isset($_POST['connexion'])){
		require('config.php');
		$email = $_POST['email'];
		$password = $_POST['pass'];

		$requete = "SELECT * FROM employe WHERE email = '$email' AND motdepasse = '$password'";
		$res = ($link->query($requete))->fetch_all(MYSQLI_ASSOC); 
		
		if(sizeof($res) > 0){
			session_start();
			/*var_dump($res);*/
			/*echo($res['0']['id']);*/
			$_SESSION['idEmploye'] = $res['0']['id'];
			$_SESSION['nom'] = $res ['0']['Nom'];
			$_SESSION['grade'] = $res ['0']['grade'];
			$_SESSION['email'] = $res ['0']['email'];
			/*var_dump($_SESSION);*/
			header('Location: ../accueil/accueil.php');
		}else{
			session_start();
			$_SESSION['error_connexion'] = "Erreur de connexion! Merci de vérifier vos identiants";
			header('Location: ../index.php');
		}

	}else{
		header('Location: ../index.php');
	}

?>