<?php
	include '../config/config.php';
	include 'connexion.php';
	$requete = "SELECT * FROM utilisateurs WHERE email = '$email'";
	$resultat = mysqli_query($connexion, $requete);

	if(mysqli_num_rows($resultat) > 0){
		$row = mysqli_fetch_assoc($resultat);

	$_SESSION['nom'] = $row['nom'];
}
?>