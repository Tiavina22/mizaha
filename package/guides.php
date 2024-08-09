<?php
	//connexion à la base de donnée
	$server = "localhost";
	$username = "root";
	$mdp = "";
	$dbname = "mizaha";

	$conn = new mysqli($server, $username,$mdp,$dbname);
	if ($conn->connect_error){
		die("Connexion échouée : " . $conn->connect_error);
	}
	

	//récupération des données 
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$telephone = $_POST['telephone'];
	$adresse = $_POST['adresse'];
	$description = $_POST['description'];
	$jour = $_POST['jour'];
	$mois = $_POST['mois'];
	$annee = $_POST['annee'];
	$sexe = $_POST['sexe'];
	
	$nom = mysqli_real_escape_string($conn, $nom);
	$email = mysqli_real_escape_string($conn, $email);
	$telephone = mysqli_real_escape_string($conn, $telephone);
	$adresse = mysqli_real_escape_string($conn, $adresse);
	$description = mysqli_real_escape_string($conn, $description);

	//Traitement de la photo principale
	$photoProfile = '';
	if (isset($_FILES['photoProfile']) && $_FILES['photoProfile']['error'] === UPLOAD_ERR_OK) {
		$photoProfile = 'uploads/'. $_FILES['photoProfile']['name'];
		move_uploaded_file($_FILES['photoProfile']['tmp_name'], $photoProfile);
	}
	/*
	$photoPrincipale = $_FILES['photo_principale'];
	$photoPrincipaleNom = $photoPrincipale['name'];
	$photoPrincipaleTmp = $photoPrincipale['tmp_name'];
	move_uploaded_file($photoPrincipaleTmp,"uploads/endroits/" . $photoPrincipaleNom);*/

	//insértion des données dans la table "guides"
	$sql = "INSERT INTO guides (email,nom,telephone,adresse,description,jour, mois, annee, photo_profile, sexe) VALUES ('$email', '$nom', '$telephone', '$adresse', '$description','$jour', '$mois', '$annee', '$photoProfile', '$sexe')";
	if ($conn->query($sql) === TRUE){
		$guidesId = $conn->insert_id;
		/*
		//traitement des images supplémentaire
		$imagesSupplementaires = $_FILES['images_supplementaires'];
		$totalImages = count($imagesSupplementaires['name']);

		for ($i=0; $i< $totalImages; $i++){
	$imageNom = $imagesSupplementaires['name'][$i];
	$imageTmp = $imagesSupplementaires['tmp_name'][$i];
	move_uploaded_file($imageTmp,"uploads/" . $imageNom);

	//insértion des nom des fichiers d'images dans la table "images_hotels"
	$sql = "INSERT INTO images_guides  (nom_image) VALUES ('$imageNom')";
	$conn->query($sql);
		}*/
		echo "Le guide a été ajouté avec succès !";
	} else {
		echo "Erreur lors de l'ajout de guide: ".$conn->error;
	}
	$conn->close();
?>