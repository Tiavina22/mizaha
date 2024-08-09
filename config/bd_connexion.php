<?php 
	$server = "localhost";
	$username = "root";
	$mdp = "";
	$dbname = "mizaha";

	$conn = new mysqli($server, $username,$mdp,$dbname);
	if ($conn->connect_error){
		die("Connexion échouée : " . $conn->connect_error);
	}
?>