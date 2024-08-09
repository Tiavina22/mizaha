<?php
	session_start();
	include '../package/connexion.php';
	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
		header("Location: ../index.php");
		exit();
	}
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
			$sql = "SELECT nom FROM guides WHERE id = $id";
			$resultat = $conn->query($sql);
			$row = $resultat->fetch_assoc();
			$nomGuide = $row['nom'];

			?>
			<button onclick="alert('Programme éffectuer du guide <?php echo "$nomGuide"; ?>')" style="background-color:#1ED760;border: none;color: white;border-radius: 15px;padding: 10px;font-size:14px;cursor:pointer;width: 120px;font-family: poppinsBold;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">Programmer</button>
			<form style="margin-left: 10px;cursor:pointeur;" action="../package/deconnexion.php" method="POST">
             		<button style="border:none;background-color: #181818;cursor:pointeur;padding:10px;border-radius: 50%;" title="Se déconnecter" type="submit" name="deconnecter" class="buttonSeDeconnecter" id="btn_deconnecter"><i style="cursor:pointeur;" class="fa fa-sign-out fa-2x" style="position:relative;top: -2px;margin-left: 3px;"></i></button>
             </form>
             <?php
               		$conn = new PDO('mysql:host=localhost;dbname=mizaha','root',"");
               		$sql = "SELECT nom, photo_profile FROM utilisateurs WHERE email = :email";
               		$stmt = $conn->prepare($sql);
               		$stmt->execute(['email' => $_SESSION['email']]);
               		$utilisateur = $stmt->fetch();

               		$nomUtilisateur = $utilisateur['nom'];
               		$photoProfile = $utilisateur['photo_profile'];
               	
               		 
                ?>
             <div style="margin-left: 10px;"><img style="width: 50px;height: 50px;border-radius: 50%;" class="profilImage" src="<?php echo "../package/$photoProfile"; ?>" /></div>
		</div>
	</div>
<?php 
	include '../config/bd_connexion.php';

	//récuperation de l'identifiants
	$id = $_GET['id'];

	//récuperation des détails de l'hôtel depuis la base de donnéées
	$sql = "SELECT * FROM guides WHERE id = $id";
	$resultat = $conn->query($sql);

	//récupération des données 
	$row = $resultat->fetch_assoc();
	$email = $row['email'];
	$nom = $row['nom'];
	$telephone = $row['telephone'];
	$adresse = $row['adresse'];
	$description = $row['description'];
	$jour = $row['jour'];
	$mois = $row['mois'];
	$annee = $row['annee'];
	$sexe = $row['sexe'];
	$photoPrincipale = $row['photo_profile'];

	$conn->close();
?>
	<div style="display:flex;flex-direction: row;width: 100%;margin-top: 20px;">
		<div style="display:flex;flex-direction: row;width: 50%;">
			<div>
				<?php echo '<img style="width:350px;height:350px;border-radius:15px;" src="../package/' . $photoPrincipale . '" alt="Photo principale">'; ?>
			</div>
			<div style="margin-left:25px;display: flex;flex-direction: column;padding-bottom:35px;padding-top:35px;justify-content: space-between;">
				<?php 
					echo '<h3> Email : ' . $email . '</h3><br>';
					echo '<h1 style="font-family:poppinsBold;font-size:45px;">' . $nom . '</h1><br>';
					echo '<h4> Adresse : ' . $adresse . '</h4><br>';
					echo '<h2>' . $telephone . ' <span style="color:#CECECE;font-size:14px;"> libre
					</span></h2>';
				?>
			</div>
		</div>
		<div style="width:50%;">
			<h1>A propos du guide</h1>
			<?php echo '<p>' . $description . '</p>'; ?>
		</div>
	</div>
</body>
</html>
