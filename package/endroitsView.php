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


	//Récupération des donées endroits
	$sql = "SELECT * FROM hotels LIMIT 3";
	$resultat = $conn->query($sql);

	//Vérification si de shôtels existent
	if ($resultat->num_rows > 0) {
		//Affichage des hôtels
		while ($row = $resultat->fetch_assoc()){
			$hotelId = $row['id'];
			$nom = $row['nom'];
			$photoPrincipale = $row['photo_principale'];

			//Obtenir les 100 premiers mots de la description
			$description = $row['description'];
			$descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 100));

			//Affichage de la carte de l'endroit
			echo '<div class="endroit-card" style="border:1px solid #ccc;border-radius:5px;padding:10px;margin-bottom:10px;width:200px">';
			echo '<img style="width:100%;height:50px;object-fit:cover;border-radius5px;margin-bottom:10px;" src="uploads/' . $photoPrincipale . ' ">';
			echo '<h3 style="margin:0;font-size:18px;">' . $nom . '</h3>';
			echo '<p style="margin:0;font-size:14px;">' . $descriptionShort . '</p>';
			echo '</div>';
			echo "$photoPrincipale";
		}
	}else{
		echo "Aucun endroit trouvé.";
	}
	$conn->close();
	echo '<img src="test.jpg">';
 ?>
