<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mizaha</title>
    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/init.css">
</head>
<body>
	<div style="display:flex;flex-direction:row;justify-content: space-between;align-items: center;">
		<div style="display:flex;flex-direction:row;align-items: center;">
			<img class="logo" src="../src/img/logo.png">
			<p style="margin-left:10px;font-family: poppinsBold;">Mizaha Hôtels</p>
		</div>
		<div style="display:flex;flex-direction:row;align-items: center;">
			<?php
			include '../config/bd_connexion.php';

			//récuperation de l'identifiants
			$id = $_GET['id'];

			//récuperation des détails de l'hôtel depuis la base de donnéées
			$sql = "SELECT nom FROM hotels WHERE id = $id";
			$resultat = $conn->query($sql);
			$row = $resultat->fetch_assoc();
			$nomHotel = $row['nom'];

			?>
			<button  style="background-color:#1ED760;border: none;color: white;border-radius: 15px;padding: 10px;font-size:14px;cursor:pointer;width: 100px;font-family: poppinsBold;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">Réserver</button>
			<form style="margin-left: 10px;cursor:pointeur;" action="../package/deconnexion.php" method="POST">
             		<button style="border:none;background-color: #181818;cursor:pointeur;padding:10px;border-radius: 50%;" title="Se déconnecter" type="submit" name="deconnecter" class="buttonSeDeconnecter" id="btn_deconnecter"><i style="cursor:pointeur;" class="fa fa-sign-out fa-2x" style="position:relative;top: -2px;margin-left: 3px;"></i></button>
             </form>
		</div>
	</div>
<?php 
	include '../config/bd_connexion.php';

	//récuperation de l'identifiants
	$id = $_GET['id'];

	//récuperation des détails de l'hôtel depuis la base de donnéées
	$sql = "SELECT * FROM hotels WHERE id = $id";
	$resultat = $conn->query($sql);

	
		$row = $resultat->fetch_assoc();
		$nom = $row['nom'];
		$type = $row['type'];
		$region = $row['region'];
		$adresse = $row['adresse'];
		$description = $row['description'];
		$photoPrincipale = $row['photo_principale'];
		$photoSupllementaires = $row['photo_supplementaire'];

	$conn->close();
?>
	<div style="display:flex;flex-direction: row;width: 100%;margin-top: 20px;">
		<div style="display:flex;flex-direction: row;width: 40%;">
			<div>
				<?php echo '<img style="width:350px;height:350px;border-radius:15px;" src="../package/' . $photoPrincipale . '" alt="Photo principale">'; ?>
			</div>
			<div style="margin-left:25px;display: flex;flex-direction: column;padding-bottom:35px;padding-top:35px;justify-content: space-between;">
				<?php 
					echo '<h3> Région : ' . $region . '</h3><br>';
					echo '<h1 style="font-family:poppinsBold;font-size:45px;">' . $nom . '</h1><br>';
					echo '<h4> Adresse : ' . $adresse . '</h4><br>';
					echo '<h2>' . $type . ' <span style="color:#CECECE;font-size:14px;"> toujours ouverte</span></h2>';
				?>
			</div>
		</div>
		<div style="width:60%;">
			<h1>Description de l'hôtel</h1>
			<?php echo '<p>' . $description . '</p>'; ?>
		</div>
	</div>
	<div style="display:flex;flex-direction: row;flex-wrap: wrap;width: 100%;justify-content: center;margin-top: 20px;">
		<?php
			if (!empty($photoSupllementaires)) {
			$photos = explode(',', $photoSupllementaires);
			foreach ($photos as $photo) {
				echo '<img style="width:300px;height:300px;margin-left:20px;border-radius:15px;" src="../package/uploads/'. $photo . '" alt="Photo supplémentaire">';
			}
		}
		 ?>
	</div>
</body>
</html>
