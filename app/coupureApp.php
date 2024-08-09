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
    <link rel="shortcut icon" href="src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/coupure.css">
</head>
<body>
	<?php
		//verifier si l'utilisateurs est déja connecter
		if (isset($_SESSION['email'])) {
			header('Location: ../app/homeApp.php');
		}else{
			echo "
				<div class='coupure'>
					<div style='display:flex;flex-direction:row;align-items:center;'>
						<img src='../src/img/logo.png'>
						<p style='font-family:poppinsBold;margin-left:10px;'>Mizaha</p>
					</div>
					<div style='margin-top:25px;'>
					<p style='font-family:poppinsBold;font-size:28px;margin:10px;padding-left:60px;padding-right:60px;'>Vous devez se connecter pour profiter tous les fonctionnalités</p>
					</div>
					<div style='display:flex;flex-direction:row;align-items:center;margin-top:25px;padding-right:80px;padding-left:80px;'>
						<div style='width:60%;'>
						<p style='color:#CECECE;'>Vous n'avez pas un compte mizaha ?</p>
						</div>
						<div style='margin-left:10px;width:40%;'>
							<a style='color:#1ED760;font-family:poppinsBold;' href='inscriptionApp.php'>S'inscrire ici</a>
						</div>
					</div>
					<div style='margin-top:25px;'>
						<a style='color:#1ED760;font-family:poppinsBold;' href='connexionApp.php'>Se connecter</a>
					</div>
				</div>
			";
		}
	?>
</body>
<!--
	<div>
	</div>
-->