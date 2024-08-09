<?php
	session_start();
	include '../package/connexion.php';
	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
		header("Location: ../index.php");
		exit();
	}
	include '../config/bd_connexion.php';

	//récuperation de l'identifiants
	$id = $_GET['id'];

	//récuperation des détails de l'hôtel depuis la base de donnéées
	$sql = "SELECT * FROM hotels WHERE id = $id";
	$resultat = $conn->query($sql);

	//vérification s'il y a des résultats
	if ($resultat->num_rows > 0) {
		// Affichage des détails de l'hôtels
		$row = $resultat->fetch_assoc();
		$nom = $row['nom'];
		$type = $row['type'];
		$region = $row['region'];
		$adresse = $row['adresse'];
		$description = $row['description'];
		$photoPrincipale = $row['photo_principale'];
		$photoSupllementaires = $row['photo_supplementaire'];

		echo '<h1>' . $nom . '</h1>';
		echo '<h2>' . $type . '</h2>';
		echo '<h3>' . $region . '</h3>';
		echo '<h4>' . $adresse . '</h4>';
		echo '<p>' . $description . '</p>';
		echo '<img src="../package/' . $photoPrincipale . '" alt="Photo principale"><br>';

		//Affichage des photos supplémentaires
		if (!empty($photoSupllementaires)) {
			$photos = explode(',', $photoSupllementaires);
			foreach ($photos as $photo) {
				echo '<img src="../package/uploads/'. $photo . '" alt="Photo supplémentaire">';
			}
		}
	}else {
		echo "Aucun détail trouvé pour cette endroit.";
	}

	$conn->close();
?>