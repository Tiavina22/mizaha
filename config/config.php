<?php  
/* connexion à la base de données
$bddPDO = new PDO('mysql:host=localhost;dbname=mizaha','root',"");

$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
$connexion = mysqli_connect("localhost","root","","mizaha");
if (!$connexion) {
	die("Erreur de connexion à la base de données :".mysqli_connect_error());
}
?>