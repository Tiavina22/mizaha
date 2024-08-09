<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	session_start();
	//vérificatipn si le bouton de déconnexion a été soumis
	if(isset($_POST['deconnecter'])){
		//Détruire la session
		session_destroy();
		$_SESSION = array();
		//Rediriger vers la page de index
		header('Location: ../index.php');
		exit;
	};
?>