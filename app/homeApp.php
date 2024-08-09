<?php
	session_start();
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
    <link rel="stylesheet" href="../src/css/app.css">
    <link rel="stylesheet" type="text/css" href="../src/css/home.css">
    <style type="text/css">
    	.btn_started, #starded{
    		transition: all 0.3s ease;
    	}
    	.btn_started:hover{
    		cursor: pointer;
    		transform: scale(2);
    		box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}
		*{
			overflow-x: hidden;
			overflow-y: hidden;
		}
    </style>
</head>
<body>
   <!-- Header de l'application -->
   <div class="headerApp">

      <!-- left header de l'application -->
      <div class="left">
			<div class="leftTop">
            <div class="btn">
               <i class="fa fa-home fa-2x"></i>
               <a href="homeApp.php" class="bindAccueil" style="border-bottom: 4px solid #1ED760;">Accueil</a>
            </div>
            <div class="btn">
               <i class="fa fa-search fa-2x"></i>
               <a href="rechercheApp.php" class="bindRecherche">Recherche</a>
            </div>
            </div>
			<div class="leftFoot">
            <div>
               <div class="btn">
                  <i class="fa fa-map-marker fa-2x" style="margin-left: 5px;"></i>
                  <a href="endroitsApp.php" class="bindEndroits" style="margin-left: 40px;">Endroits touristiques</a>
               </div>
               <div class="btn">
                  <i class="fa fa-hotel fa-2x"></i>
                  <a href="hotelsApp.php" class="bindHotels" style="margin-left: 26px;">Hôtels</a>
               </div>
               <div class="btn">
                  <i class="fa fa-truck fa-2x"></i>
                  <a href="transportApps.php" class="bindTransport" style="margin-left: 29px;">Agence de transport</a>
               </div>
               <div class="btn">
                  <i class="fa fa-user-secret fa-2x" style="margin-left: 5px;"></i>
                  <a href="guidesApp.php" style="margin-left: 28px;" class="bindGuides">Guides</a>
               </div>
            </div>

            <!-- légale texte information de l'application -->
            <div class="legaleTexte">
               <div>
                  <p>Légal</p>
                  <p>Centre de confidentialité</p>
                  <p>Protection des données</p>
               </div>
               <div>
                  <p>Accéssibilité</p>
               </div>
            </div>
            <!-- légale texte information de l'application -->

            <div class="buttonLanguage" style="cursor:pointer;width:135px;" title="Seulement la Français est disponnible">
               <i class="fa fa-globe fa-2x"></i>
               <a href="#">Français</a>
            </div>
			<img src="../src/img/logoispm.jpg" style="border-radius:50%;margin-left:10px;margin-top:10px;" class="logoImg">
         </div>
      </div>
      <!-- left header de l'application -->

      <!-- centre header de l'application -->
      <div class="centre">

         <!-- centre Top de l'application -->
         <div class="centreTop">
            <div class="logoSection">
               <i class="fa fa-home fa-2x"></i>
               <p style="font-family: poppinsBold; margin-left: 10px;border-bottom: 4px solid #1ED760;">Accueil</p>
               
               <?php
               		$conn = new PDO('mysql:host=localhost;dbname=mizaha','root',"");
               		$sql = "SELECT nom, photo_profile FROM utilisateurs WHERE email = :email";
               		$stmt = $conn->prepare($sql);
               		$stmt->execute(['email' => $_SESSION['email']]);
               		$utilisateur = $stmt->fetch();

               		$nomUtilisateur = $utilisateur['nom'];
               		$photoProfile = $utilisateur['photo_profile'];
               	
               		 
                ?>
			</div>
             <div style="display:flex;flex-direction: row;align-items: center;">
             	<form action="../package/deconnexion.php" method="POST">
             		<button type="submit" name="deconnecter" class="buttonSeDeconnecter" id="btn_deconnecter"><i class="fa fa-sign-out fa-lg" style="position:relative;top: -2px;margin-left: 3px;"></i></button>
             	</form>
             	<div><img class="profilImage" src="<?php echo "../package/$photoProfile"; ?>" /></div>
            </div>
         </div>
         <!-- centre Top de l'application -->


         <!-- centre application home ou accueil -->
         <div class="home" id="home" style="overflow-x: hidden;">
         	<div>
         	<h1 class="texteBienvenue">Bienvenue sur Mizaha, Bonjour <br> <?php echo " <span style='color:#1ED760;font-family:poppinsBold;font-size:30px;margin-left:5px;'>$nomUtilisateur</span>";?></h1>
         	</div>
	         <div class="getStarted" style="padding-bottom: 30px;">
	         	<p>Trouvez facilement et plannifier votre visite à Madagascar avec nous. Trouvez des endroits, parcs, plages, hôtel, agence de transport, preque tout avec Mizaha ! <p>
	         	<p>Commencer dès maintenant pour ne perdre pas du temps.</p>
	         	<a href="#started" style="position: relative;top: 20px;" class="btn_started">Commencer</a>
	         </div>
	         <div class="endroitPopulaire" id="started" style="margin-top:50px;margin-left: 25px; font-family:">
	         	<p style="font-family:poppinsBold">Les endroits ou sites populaires</p>
	         	<div class="endroitsAffichage" style="display:flex; flex-wrap: wrap;padding-top: 50px;padding-bottom:50px;padding-left: 30px;">
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
	$sql = "SELECT * FROM endroits LIMIT 10";
	$resultat = $conn->query($sql);

	//Vérification si de endroits existent
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
			echo "<a href='endroitsDetails.php?id=$endroitId' class='endroit-card' style='width:16%;margin-left:5px;background-color:#181818;border-radius:15px;padding:10px;margin-top:10px;'>";
			echo '<div>';
			echo '<img style="width:98%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px;" src="../package/' . $photoPrincipale . ' ">';
			echo '<h3 style="margin:0;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
			echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;">' . $descriptionShort . '</p>';
			echo '</div>';
			echo '</a>';
		}
	}else{
		echo "Aucun endroit trouvé.";
	}
	$conn->close();
 ?>
	         	</div>
	         </div>


	         <!-- Affichage des hôtels -->

	         <div class="endroitPopulaire" style="margin-top:30px;margin-left: 25px; font-family:">
	         	<p style="font-family:poppinsBold">Les hôtels 4 étoiles</p>
	         	<div class="endroitsAffichage" style="display:flex; flex-wrap: wrap;margin-top: 10px;padding-left: 30px;padding-bottom: 50px;padding-top: 50px;">
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
	$sql = "SELECT * FROM hotels LIMIT 10";
	$resultat = $conn->query($sql);

	//Vérification si de endroits existent
	if ($resultat->num_rows > 0) {
		//Affichage des hôtels
		while ($row = $resultat->fetch_assoc()){
			$hotelId = $row['id'];
			$nom = $row['nom'];
			$photoPrincipale = $row['photo_principale'];

			//Obtenir les 100 premiers mots de la description
			$description = $row['description'];
			$descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 10));

			//Affichage de la carte de l'hôtel
			echo "<a href='hotelsDetails.php?id=$hotelId' class='endroit-card' style='width:16%;margin-left:5px;background-color:#181818;border-radius:15px;padding:10px;margin-top:10px;'>";
			echo '<div>';
			echo '<img style="width:98%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px;" src="../package/' . $photoPrincipale . ' ">';
			echo '<h3 style="margin:0;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
			echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;">' . $descriptionShort . '</p>';
			echo '</div>';
			echo '</a>';
		}
	}else{
		echo "Aucun endroit trouvé.";
	}
	$conn->close();
 ?>
	         	</div>
	         </div>

	         <!-- Affichage des hôtels -->


	         <!-- Début Affichage des transports -->
				<div class="endroitPopulaire" style="margin-top:30px;margin-left: 25px; font-family:">
	         	<p style="font-family:poppinsBold">Les Transports aériennes</p>
	         	<div class="endroitsAffichage" style="display:flex; flex-wrap: wrap;margin-top: 10px;padding-left: 30px;padding-bottom: 50px;padding-top: 50px;">
	         		<?php
							//connexion à la base de donnée
							include '../config/bd_connexion.php';

							//Récupération des donées endroits
							$sql = "SELECT * FROM transports LIMIT 10";
							$resultat = $conn->query($sql);

							//Vérification si de transport existent
							if ($resultat->num_rows > 0) {
							//Affichage des transports
							while ($row = $resultat->fetch_assoc()){
								$transportId = $row['id'];
								$nom = $row['nom'];
								$photoPrincipale = $row['photo_principale'];

								//Obtenir les 100 premiers mots de la description
								$description = $row['description'];
								$descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 10));

								//Affichage de la carte de transports
								echo "<a href='transportsDetails.php?id=$transportId' class='endroit-card' style='width:16%;margin-left:5px;background-color:#181818;border-radius:15px;padding:10px;margin-top:10px;'>";
								echo '<div>';
								echo '<img style="width:98%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px;" src="../package/' . $photoPrincipale . ' ">';
								echo '<h3 style="margin:0;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
								echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;">' . $descriptionShort . '</p>';
								echo '</div>';
								echo '</a>';
							}
							}else{
								echo "Aucun endroit trouvé.";
							}
							$conn->close();
					 	?>
	         	</div>
	         </div>
				<!-- Fin Affichage des transports -->
				<!-- Début Affichage des guides -->
	         <div class="guidesPopulaires" style="margin-top:30px;margin-bottom:50px;margin-left: 25px; font-family:">
	         	<p style="font-family:poppinsBold">Les guides pour vous guider</p>
	         	<div class="guidesAffichage" style="display:flex; flex-wrap: wrap;margin-top: 10px;padding-left: 30px;padding-bottom: 50px;padding-top: 50px;">
	         		<?php
							//connexion à la base de donnée
							include '../config/bd_connexion.php';

							//Récupération des donées guides
							$sql = "SELECT * FROM guides LIMIT 10";
							$resultat = $conn->query($sql);

							//Vérification si de endroits existent
							if ($resultat->num_rows > 0) {
							//Affichage des guides
							while ($row = $resultat->fetch_assoc()){
								$guideId = $row['id'];
								$nom = $row['nom'];
								$adresse = $row['adresse'];
								$photoProfile = $row['photo_profile'];

								//Obtenir les 100 premiers mots de la description
								/*
								$description = $row['description'];
								$descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 10));*/

								//Affichage de la carte de guides
								echo "<a href='guidesDetails.php?id=$guideId' target='blank' class='endroit-card' style='width:16%;margin-left:5px;background-color:#181818;border-radius:15px;padding:10px;margin-top:10px;'>";
			echo '<div>';
								echo '<img style="width:98%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px;" src="../package/' . $photoProfile . ' ">';
								echo '<h3 style="margin:0;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
								/*
								echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;">' . $descriptionShort . '</p>';
								*/
								echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;">' . $adresse . '</p>';
								echo '</div>';
								echo '</a>';
							}
							}else{
								echo "Aucun guides trouvé.";
							}
							$conn->close();
 						?>
	         	</div>
	         </div>
				<!-- Fin Affichage des guides -->
			</div>
         <!-- Fin entre application home ou accueil -->

      </div>
      <!-- right Top de l'application -->
         <div class="rightApp">
         	<!-- budget section de l'application -->
         	<!-- budget section de l'application -->
            <div class="budgetSection" style="display: flex;flex-direction: column;">
               <p class="title">Plannifier votre budget</p>
               <p class="subtitle">C'est simple, nous alons vous aider</p>
               <a class="btn_budget" href="budgetApp.php">Créer une budget</a>
            </div>
            
            <!-- preferences section de l'application -->
            <div class="preferenceSection" style="display: flex;flex-direction: column;">
               <p class="title">Cherchons les endroits auxquels
vous préférez</p>
               <p class="subtitle">Nous vous transmettrons des informations sur les
nouveaux sites touristiques</p>
               <a href="endroitsApp.php" target="_blank">Parcourir les endroits</a>
            </div>
            <!-- preferences section de l'application -->
         </div>
         <!-- right Top de l'application -->
   </div>

   <!-- Footer de l'application 
   <div class="footerApp">
      <div>
         <div>EXTRAIT SUR MIZAHA</div>
         <p>Inscrivez-vous pour visiter endroits ou sites en illimités, avec quelques coupures. Pas besoin de carte credit</p>
      </div>
      <div>
         <a href="app/inscriptionApp.php" class="bindInscription">S'inscrire gratuitement</a>
      </div>
   </div>
    Footer de l'application -->
</body>
</html>