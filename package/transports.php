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
	$nom = $_POST['nom'];
	$type = $_POST['type'];
	$destination = $_POST['destination'];
	$adresse = $_POST['adresse'];
	$description = $_POST['description'];

	$photoPrincipale = $_FILES['photo_principale']['name'];
	$photoPrincipaleTmp = $_FILES['photo_principale']['tmp_name'];
	$photoPrincipaleDestination = "uploads/" . $photoPrincipale;
	move_uploaded_file($photoPrincipaleTmp,$photoPrincipaleDestination);

	//Traitement des photos supplémentaire
	$photoSupllementaires = array();
	if (!empty($_FILES['images_supplementaires']['name'])){
		foreach ($_FILES['images_supplementaires']['tmp_name'] as $key => $tmpName) {
			$photoSupllementaire = $_FILES['images_supplementaires']['name'][$key];
			$photoSupllementaireTmp = $_FILES['images_supplementaires']['tmp_name'][$key];
			$photoSupllementaireDestination = "uploads/" . $photoSupllementaire;
			move_uploaded_file($photoPrincipaleTmp,$photoPrincipaleDestination);
			$photoSupllementaires[] = $photoSupllementaire;
		}
	}

	//insértion des données dans la table "hotels"
	$sql = "INSERT INTO transports (nom,type,destination,adresse,description, photo_principale, photo_supplementaire) VALUES ('$nom', '$type', '$destination', '$adresse', '$description', '$photoPrincipaleDestination', '" . implode(",", $photoSupllementaires) . "')";
	if ($conn->query($sql) === TRUE){
		/*
		$hotelId = $conn->insert_id;

		//traitement des images supplémentaire
		$imagesSupplementaires = $_FILES['images_supplementaires'];
		$totalImages = count($imagesSupplementaires['name']);

		for ($i=0; $i< $totalImages; $i++){
	$imageNom = $imagesSupplementaires['name'][$i];
	$imageTmp = $imagesSupplementaires['tmp_name'][$i];
	move_uploaded_file($imageTmp,"uploads/" . $imageNom);

	//insértion des nom des fichiers d'images dans la table "images_hotels"
	$sql = "INSERT INTO images_endroits  (nom_image) VALUES ('$imageNom')";
	$conn->query($sql);
		}*/
		echo "Le transports a été ajouté avec succès !";
	} else {
		echo "Erreur lors de l'ajout de L'transports : ".$conn->error;
	}
	$conn->close();

	//Traitement de la photo principale
	/*
	$photoPrincipale = '';
	if (isset($_FILES['photo_principale']) && $_FILES['photo_principale']['error'] === UPLOAD_ERR_OK) {
		$photoPrincipale = 'uploads/'. $_FILES['photo_principale']['name'];
		move_uploaded_file($_FILES['photo_principale']['tmp_name'], $photoPrincipale);
	}
	/*
	$photoPrincipale = $_FILES['photo_principale'];
	$photoPrincipaleNom = $photoPrincipale['name'];
	$photoPrincipaleTmp = $photoPrincipale['tmp_name'];
	move_uploaded_file($photoPrincipaleTmp,"uploads/endroits/" . $photoPrincipaleNom);

	//insértion des données dans la table "transports"
	$sql = "INSERT INTO transports (nom,type,destination,adresse,description,photo_principale) VALUES ('$nom', '$type', '$destination', '$adresse', '$description', '$photoPrincipale')";
	if ($conn->query($sql) === TRUE){
		$transportId = $conn->insert_id;

		//traitement des images supplémentaire
		$imagesSupplementaires = $_FILES['images_supplementaires'];
		$totalImages = count($imagesSupplementaires['name']);

		for ($i=0; $i< $totalImages; $i++){
	$imageNom = $imagesSupplementaires['name'][$i];
	$imageTmp = $imagesSupplementaires['tmp_name'][$i];
	move_uploaded_file($imageTmp,"uploads/" . $imageNom);

	//insértion des nom des fichiers d'images dans la table "images_transports"
	$sql = "INSERT INTO images_transports  (nom_image) VALUES ('$imageNom')";
	$conn->query($sql);
		}
		echo "Transports a été ajouté avec succès !";
	} else {
		echo "Erreur lors de l'ajout du transports : ".$conn->error;
	}
	$conn->close();
	*/
?>