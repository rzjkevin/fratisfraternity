<?php

	$link = mysqli_connect("127.0.0.1", "root", "", "fratisbanque");

	if (!$link) {
	    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
	    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
	    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

?>