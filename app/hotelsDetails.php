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
			$sql = "SELECT nom FROM hotels WHERE id = $id";
			$resultat = $conn->query($sql);
			$row = $resultat->fetch_assoc();
			$nomHotel = $row['nom'];

			?>
			<button onclick="alert('Réservation éffectuer de l\'hôtel <?php echo "$nomHotel"; ?>')" style="background-color:#1ED760;border: none;color: white;border-radius: 15px;padding: 10px;font-size:14px;cursor:pointer;width: 100px;font-family: poppinsBold;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">Réserver</button>
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
			<div id="ticket" style="background-color: white; padding: 20px; width:40%;">
        <div></div>
        <h1 style="color:black;">Formulaire de réservation</h1>
        <form action="" style="color:black;">
            <label for="" style="color:black;">Nombre de personnes</label><br>
            <input id="inputNumber" type="number" style="color:black;padding:10px;"><br>
            <label for="" style="color:black;">Type de chambre</label><br>
            <select id="selectRoom" name="" id="" style="color:black;background-color:white;padding:10px;">
                <option value="famille">Chambre familliale (40.000 MGA/J)</option>
                <option value="couple">Chambre à deux perso (60.000 MGA/J)</option>
            </select><br>
            <label for="" style="color:black;">Date</label><br>
            <input id="inputDate1" type="date" style="color:black;"><span style="margin-left:10px; margin-right:10px;color: black;">à</span>
            <input id="inputDate2" type="date" style="color:black;">
        </form>
        <button onclick="generateTicket()" style="color:white;border:none;padding:10px; border-radius: 10px;margin-top:10px; background-color: #0DA20D;">Télécharger le ticket</button>
    </div>
			<script src="html2canvas.min.js"></script>
			<script>
        function generateRandomCode() {
            return Math.floor(100000 + Math.random() * 900000);
        }

        function generateTicket() {
            var numberOfPeople = document.getElementById('inputNumber').value;
            var roomType = document.getElementById('selectRoom').value;
            var startDate = new Date(document.getElementById('inputDate1').value);
            var endDate = new Date(document.getElementById('inputDate2').value);
            var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
            var numberOfDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var roomCostPerDay = 0;
            if (roomType === "famille") {
                roomCostPerDay = 40000;
            } else if (roomType === "couple") {
                roomCostPerDay = 60000;
            }
            var totalCost = numberOfPeople * roomCostPerDay * numberOfDays;
            var randomCode = generateRandomCode();

			var link = document.createElement('a');
      link.download = 'ticket1.png';
      link.href = '../src/img/ticket1.png';
      link.click();

            /*html2canvas(document.getElementById('ticket')).then(function(canvas) {
                var link = document.createElement('a');
                link.download = '../src/img/ticket1.png';
                document.body.appendChild(canvas);
                var ctx = canvas.getContext('2d');
                ctx.font = '20px Arial';
                ctx.fillText('Montant total : ' + totalCost + ' MGA', 10, 200);
                ctx.fillText('Code de validation : ' + randomCode, 10, 230);
                link.href = canvas.toDataURL();
                link.click();
            });*/
        }
    </script>
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
