<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mizaha</title>
	<link rel="stylesheet" type="text/css" href="../src/css/budget.css">
</head>
<body>
	<div style="width:40%;flex-direction: column;display: flex;height:600px;background-color: #1D1D1D;justify-content: center;margin-left: 32%;line-height: 50px;">
		<div>
			<h1 style="font-size:35px;font-family: poppinsBold;">Plannification de budget</h1>
		</div>
		<div>
		<form action="../package/budget.php" method="GET">
			<label style="font-size:20px;margin-right: 45px;" for="somme">Entrer le somme en Ariary</label><br>
			<input type="number" name="budget" placeholder="exemple : 500000 Ar"><br>
			<label style="font-size:20px;" for="number">Entrer le nombre de personne</label><br>
			<input type="number" name="personne" placeholder="exemple : 2"><br>
			<button style="padding:10px;width: 120px;background-color: #1ED760;color: white;border-radius: 15px;border: none;font-size: 18px;margin-top: 35px;font-family: poppinsBold;" type="submit">Valider</button>
		</form>
		</div>
	</div>
</body>
</html>