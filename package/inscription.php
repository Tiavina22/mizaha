<?php

session_start();

//verifier si l'utilisateurs est déja connecter
if (isset($_SESSION['email'])) {
	header('Location: ../app/homeApp.php');
}
//insértion des utilisateurs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$pays = $_POST['pays'];
	$adresse = $_POST['adresse'];
	$nationalite = $_POST['nationalite'];
	$mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
	$jour = $_POST['jour'];
	$mois = $_POST['mois'];
	$annee = $_POST['annee'];
	$sexe = $_POST['sexe'];

	//Gérer l'upload de la photo de profile
	$photoProfile = '';
	if (isset($_FILES['photoProfile']) && $_FILES['photoProfile']['error'] === UPLOAD_ERR_OK) {
		$photoProfile = 'uploads/'. $_FILES['photoProfile']['name'];
		move_uploaded_file($_FILES['photoProfile']['tmp_name'], $photoProfile);
	}

	include '../config/connPDO.php';
	$sql = "INSERT INTO utilisateurs (email,nom,pays,adresse,nationalite,mdp,jour,mois,annee,photo_profile,sexe) VALUES (:email, :nom, :pays, :adresse, :nationalite, :mdp, :jour, :mois, :annee, :photoProfile, :sexe)";

	$stmt = $bddPDO->prepare($sql);
	$stmt->execute(['email' => $email, 'nom' => $nom,'pays' => $pays,'adresse' => $adresse,'nationalite' => $nationalite,'mdp' => $mdp,'jour' => $jour,'mois' => $mois,'annee' => $annee,'photoProfile' => $photoProfile,'sexe' => $sexe]);
	header("Location:../app/connexionApp.php");
	/*
	//vérification si bien rempli
	if(!empty($email) && !empty($pays) && !empty($pays) && !empty($pays) && !empty($adresse) && !empty($nationalite) && !empty($mdp) && !empty($jour) && !empty($mois) && !empty($annee) && !empty($sexe)){

		//requete d'insértion
		$requete = "INSERT INTO utilisateurs (email,nom,pays,adresse,nationalite,mdp,jour,mois,annee,photoProfile,sexe) VALUES ('$email','$nom','$pays','$adresse','$nationalite','$mdp','$jour', '$mois', '$annee','$photProfile', '$sexe')";

		if(mysqli_query($connexion, $requete)){
			echo "<script type=\"text/javascript\">
					alert('Vous êtes bien inscrit!, Votre identifiant est : ');
				</script>";
				header("Location:../app/connexionApp.php");
		}else{
			echo "Un problème est survenu, l'enregistrement n'a pas été effectué!".mysqli_error($connexion);
			header("Location:../app/inscriptionApp.php");
		}
	}else{
		echo "Tous les champs sont requis!";
	};
	*/
};
?>