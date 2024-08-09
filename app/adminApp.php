<?php 

	session_start();
	//vérification si l'utilisateur est athentifié en tant qu'admnistrateur
	if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
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
    <link rel="stylesheet" href="../src/css/admin.css">
</head>
<body>
	<div class="admin">

		<!-- En tete du page admin -->
		<div class="topAdmin">
			<div class="child">
				<i class="fa fa-home fa-2x"></i>
				<p style="font-family:poppinsBold;">Admin pannel</p>
			</div>
			<div class="child">
				<p style="font-family:poppinsBold;font-size: 30px;">Pannel d'ajout des données</p>
			</div>
			<div style="display:flex;flex-direction: row;align-items: center;">
				<p style="margin-right: 15px;">Admnistrateur</p>
				<form action="../package/deconnexion.php" method="POST" style="position: relative;top: 5px;">
             		<button type="submit" name="deconnecter" class="buttonSeDeconnecter"><i class="fa fa-sign-out fa-lg"></i></button>
             	</form>
			</div>
		</div>
		<!-- En tete du page admin -->

		<!-- app du page admin -->
		
		<div class="appAdmin">
			<!-- endroit du page admin -->
			<div class="endroitFormulaire" id="form">
				<div class="title">
					<i class="fa fa-map-marker fa-2x"></i>
					<p>Endroits</p>
				</div>
				<div>
					<form action="../package/endroits.php" method="POST" enctype="multipart/form-data">
						<label>Le nom de l'endroit</label><br>
						<input type="text" name="nom" required placeholder="endroit nom"><br>
						<label>Le type de l'endroit</label><br>
						<input type="text" name="type" required placeholder="type d'endroits"><br>
						<label>La région de l'endroit</label><br>
						<input type="text" name="region" required placeholder="région ou province"><br>
						<label>L'adresse de l'endroit</label><br>
						<input type="text" name="adresse" required placeholder="emplacement exacte"><br>
						<label>Description de l'endroit</label><br>
						<input type="text" name="description" required placeholder="déscriptif endroit"><br>
						<label>Photo principale de l'endroit</label><br>
						<input type="file" name="photo_principale" required><br>
						<label>Images supplémentaires</label><br>
						<input type="file" name="images_supplementaires[]" multiple required><br>
						<button type="submit">Ajouter</button>
					</form>
				</div>
			</div>
			<!-- endroit du page admin -->

			<!-- hotels du page admin -->
			<div class="hotelsFormulaire" id="form">
				<div class="title">
					<i class="fa fa-hotel fa-2x"></i>
					<p>Hôtels</p>
				</div>
				<div>
					<form action="../package/hotels.php" method="POST" enctype="multipart/form-data">
						<label>Le nom de l'hotel</label><br>
						<input type="text" name="nom" required placeholder="hôtel nom"><br>
						<label>Le type de l'hotêl</label><br>
						<input type="text" name="type" required placeholder="type d'hôtel"><br>
						<label>La région de l'hôtel</label><br>
						<input type="text" name="region" required placeholder="région ou province"><br>
						<label>L'adresse de l'hôtel</label><br>
						<input type="text" name="adresse" required placeholder="emplacement exacte"><br>
						<label>Description de l'hôtel</label><br>
						<input type="text" name="description" required placeholder="déscriptif hôtel"><br>
						<label>Photo principale de l'hôtel</label><br>
						<input type="file" name="photo_principale" required><br>
						<label>Images supplémentaires</label><br>
						<input type="file" name="images_supplementaires[]" multiple required><br>
						<button type="submit">Ajouter</button>
					</form>
				</div>
			</div>
			<!-- endroit du page admin -->

			<!-- transport du page admin -->
			<div class="transportFormulaire" id="form">
				<div class="title">
					<i class="fa fa-truck fa-2x"></i>
					<p>Transports</p>
				</div>
				<div>
					<form action="../package/transports.php" method="POST" enctype="multipart/form-data">
						<label>Le nom du transport</label><br>
						<input type="text" name="nom" required placeholder="transport nom"><br>
						<label>Le type du transport</label><br>
						<input type="text" name="type" required placeholder="type du transport"><br>
						<label>Destination</label><br>
						<input type="text" name="destination" required placeholder="région ou province"><br>
						<label>L'adresse du transport</label><br>
						<input type="text" name="adresse" required placeholder="emplacement exacte"><br>
						<label>Description du transport</label><br>
						<input type="text" name="description" required placeholder="déscriptif transport"><br>
						<label>Photo principale du transport</label><br>
						<input type="file" name="photo_principale" required><br>
						<label>Images supplémentaires</label><br>
						<input type="file" name="images_supplementaires[]" multiple required><br>
						<button type="submit">Ajouter</button>
					</form>
				</div>
				
			</div>
			<!-- transport du page admin -->

			<!-- guides du page admin -->
			<div class="guideFormulaire" id="form">
				<div class="title">
					<i class="fa fa-user-secret fa-2x"></i>
					<p>Guides</p>
				</div>
				<div>
        <form action="../package/guides.php" method="POST" enctype="multipart/form-data" class="guideForme">
            <label for="email">Quelle est votre adresse e-mail ?</label><br>
            <input type="email" name="email" placeholder="Saisissez votre adresse e-mail" required><br>
            <label for="telephone">Quel est votre numéro de télephone ?</label><br>
            <input type="text" name="telephone" placeholder="Saisissez un de profil complet"><br>
            <label for="pays">Quelle est votre nom ?</label><br>
            <input type="text" name="nom" placeholder="Saisissez votre pays" required><br>
            <label for="adresse">Quelle est votre adresse actuellement ?</label><br>
            <input type="text" name="adresse" placeholder="Saisissez votre adresse" required><br>
            <label for="description">A propos de vous ?</label><br>
            <input type="text" name="description" placeholder="Votre description" required><br>
            <label for="naissance">Quelle est votre date de naissance ?</label><br>
            <div class="naissanceSection" style="display:flex;flex-direction: row;">
                <div class="naissance" style="width:30%">
                    <label>Jour</label><br>
                    <input style="width: 50px;" type="number" name="jour" placeholder="JJ">
                </div>
                <div class="naissance" style="width:30%">
                    <label>Mois</label><br>
                    <input style="width: 50px;" type="text" name="mois" placeholder="Mois">
                </div>
                <div class="naissance" style="width:30%">
                    <label>Année</label><br>
                    <input style="width: 50px;" type="number" name="annee" placeholder="AAAA">
                </div>
            </div>
            <label for="photoProfile">Avez-vous une photo de profile ?</label><br>
            <input type="file" id="photoProfile" name="photoProfile"required><br>
            <label for="sexe">Quelle est votre sexe ?</label><br>
            <input type="text" name="sexe" placeholder="M ou F" required><br>
            <button style="margin-top: 20px;" type="submit">Ajouter</button>
				</div>
			</div>
			<!-- guides du page admin -->
		</div>

		<!-- app du page admin -->
		
		


	</div>
	

</body>
</html>