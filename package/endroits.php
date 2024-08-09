<?php
	//connexion à la base de donnée
	$server = "localhost";
	$username = "root";
	$mdp = "";
	$dbname = "mizaha";

	//récupération des données 
	$nom = $_POST['nom'];
	$type = $_POST['type'];
	$region = $_POST['region'];
	$adresse = $_POST['adresse'];
	$description = $_POST['description'];

	$conn = new mysqli($server, $username,$mdp,$dbname);
	if ($conn->connect_error){
		die("Connexion échouée : " . $conn->connect_error);
	}

	$nom = mysqli_real_escape_string($conn, $nom);
	$type = mysqli_real_escape_string($conn, $type);
	$region = mysqli_real_escape_string($conn, $region);
	$adresse = mysqli_real_escape_string($conn, $adresse);
	$description = mysqli_real_escape_string($conn, $description);

	//Traitement de la photo principale
	/*
	$photoPrincipale = '';
	if (isset($_FILES['photo_principale']) && $_FILES['photo_principale']['error'] === UPLOAD_ERR_OK) {
		$photoPrincipale = 'uploads/'. $_FILES['photo_principale']['name'];
		move_uploaded_file($_FILES['photo_principale']['tmp_name'], $photoPrincipale);
	}*/
	
	$photoPrincipale = $_FILES['photo_principale']['name'];
	$photoPrincipaleTmp = $_FILES['photo_principale']['tmp_name'];
	$photoPrincipaleDestination = "uploads/" . $photoPrincipale;
	move_uploaded_file($photoPrincipaleTmp,$photoPrincipaleDestination);

	//Traitement des photos supplémentaire
	$images = $_FILES['images_supplementaires'];
	$imageNoms = array();
	if (!empty($images['name'][0])){
		foreach ($images['tmp_name'] as $key => $tmp_name) {
			$imageNom = time() . '_' . $images['name'][$key];
			$imageNoms[] = $imageNom;
			$destination = "uploads/" . $imageNom;
			move_uploaded_file($tmp_name, $destination);
		}
	}

	//insértion des données
	$sql = "INSERT INTO endroits (nom,type,region,adresse,description, photo_principale, photo_supplementaire) VALUES ('$nom', '$type', '$region', '$adresse', '$description', '$photoPrincipaleDestination', '" . implode(",", $imageNoms) . "')";

	if($conn->query($sql) === TRUE){
		echo "Les données insérées avec succès.";
	}else{
		echo "Erreur lors de l'insertionde données";
	}
	
	mysqli_close($conn);
?>