<?php
	session_start();
	//récupération du terme de recherche depuis la méthode GET
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mizaha</title>
	<link rel="stylesheet" href="../src/css/init.css">
	<style type="text/css">
		.endroit-card:hover{
			transform: scale(1.5);
			cursor: pointer;
    		box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}
		.endroit-card{
			transition: all 0.8s ease;
		}
	</style>
</head>
<body>

</body>
</html>
<?php
	include '../config/bd_connexion.php';

	$sql = "SELECT * FROM endroits";
	$resultat = $conn->query($sql);
	$row = $resultat->fetch_assoc();
	$nom = $row['nom'];
	$type = $row['type'];
	$region = $row['region'];
	$adresse = $row['adresse'];
	$description = $row['description'];
	$photoPrincipale = $row['photo_principale'];
	$photoSupllementaires = $row['photo_supplementaire'];

	$cn = 0;
	

	
	$somme = $_GET['budget'];
	$personne = $_GET['personne'];

	if ($somme < $cn) {
		echo "<h1>Vous n'avez pas de budget</h1>";
	}else if($somme > 0 && $somme<500000){
		$sql = "SELECT * FROM endroits WHERE description LIKE '%parc%'";
	$resultat = $conn->query($sql);
	$row = $resultat->fetch_assoc();
	$nom = $row['nom'];
	$type = $row['type'];
	$region = $row['region'];
	$adresse = $row['adresse'];
	$description = $row['description'];
	$photoPrincipale = $row['photo_principale'];
	$photoSupllementaires = $row['photo_supplementaire'];
echo "<div>";
	echo '<h1>Selon votre budget de ' . $somme . ' Ar</h1>';
	echo '<h1>et le nombre de personne ' . $personne .' ,nous vous suggerons les endroit que vous pouvez y aller</h1>';
	echo "</div>";

	echo "<div style='display:flex;flex-direction:row;flex-wrap:wrap;'>";

if ($resultat->num_rows > 0) {
		//Affichage des hôtels
		while ($row = $resultat->fetch_assoc()){
			$endroitId = $row['id'];
			$nom = $row['nom'];
			$photoPrincipale = $row['photo_principale'];

			//Obtenir les 100 premiers mots de la description
			$description = $row['description'];
			$descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 11)) . " ...";

			//Affichage de la carte de l'endroit
			echo "<a href='../app/endroitsDetails.php?id=$endroitId'style='text-decoration:none;' >";
			echo "<div class='endroit-card' style='width:180px;height:250px;margin-left:15px;background-color:#181818;border-radius:15px;padding:10px;margin-top:10px;'>";
			echo '<img style="width:98%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px;" src="../package/' . $photoPrincipale . ' ">';
			echo '<h3  style="margin:0;text-decoration:none;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
			echo '<p style="margin:0;text-decoration:none;font-size:11px;color:#CECECE;font-family:poppins;">' . $descriptionShort . '</p>';
			echo '</div>';
			echo '</a>';
		}
	}else{
		echo "Aucun endroit trouvé.";
	}
	echo "</div>";
	}else if($somme > 500000){
		$sql = "SELECT * FROM endroits WHERE type LIKE '%île%'";
	$resultat = $conn->query($sql);
	$row = $resultat->fetch_assoc();
	$nom = $row['nom'];
	$type = $row['type'];
	$region = $row['region'];
	$adresse = $row['adresse'];
	$description = $row['description'];
	$photoPrincipale = $row['photo_principale'];
	$photoSupllementaires = $row['photo_supplementaire'];
echo "<div>";
	$sommeModifi = number_format($somme, 0, ',', ' ');
	echo '<h1>Selon votre budget de ' . $sommeModifi . ' Ar</h1>';
	echo '<h1>et le nombre de personne ' . $personne .' ,nous vous suggerons les endroit que vous pouvez y aller</h1>';
	echo "</div>";

	echo "<div style='display:flex;flex-direction:row;margin-left:50px;flex-wrap:wrap;'>";

if ($resultat->num_rows > 0) {
		//Affichage des hôtels
		while ($row = $resultat->fetch_assoc()){
			$endroitId = $row['id'];
			$nom = $row['nom'];
			$photoPrincipale = $row['photo_principale'];

			//Obtenir les 100 premiers mots de la description
			$description = $row['description'];
			$descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 11)) . " ...";

			//Affichage de la carte de l'endroit
			echo "<a href='../app/endroitsDetails.php?id=$endroitId'style='text-decoration:none;' >";
			echo "<div class='endroit-card' style='width:180px;height:250px;margin-left:15px;background-color:#181818;border-radius:15px;padding:10px;margin-top:10px;'>";
			echo '<img style="width:98%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px;" src="../package/' . $photoPrincipale . ' ">';
			echo '<h3  style="margin:0;text-decoration:none;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
			echo '<p style="margin:0;text-decoration:none;font-size:11px;color:#CECECE;font-family:poppins;">' . $descriptionShort . '</p>';
			echo '</div>';
			echo '</a>';
		}
	}else{
		echo "Aucun endroit trouvé.";
	}
	echo "</div>";
	}
	
		
	

	
	$conn->close();
?>
