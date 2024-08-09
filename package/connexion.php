<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['email'];
	$mdp = $_POST['mdp'];

	

	//requête de sélection de l'utilisateur
	$requete = "SELECT * FROM utilisateurs WHERE email = '$email'";
	$resultat = mysqli_query($connexion, $requete);
	$row = mysqli_fetch_assoc($resultat);

	// Vérification du mot de passe
	if ($email == 'admin@gmail.com' && $mdp == "mizaha"){
		// Démarrage d'une session est définir la variable indiquant que l'utilisateur est un admnistrateur
		session_start();
		$_SESSION['admin'] = true;
		header("Location: ../app/adminApp.php");
	} else if ($row && password_verify($mdp, $row["mdp"])) {
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['email'] = $row['email'];
		$_SESSION['pseudo'] = $row['pseudo'];
		header("Location: ../app/homeApp.php");
		exit();
	}else{
		echo "Identifiants invalides";
	}

	// Férmeture de la connexion
	mysqli_close($connexion);
}
?>