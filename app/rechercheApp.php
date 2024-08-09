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
    <link rel="shortcut icon" href="src/img/logomizaha.png" type="image/x-icon">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="stylesheet" href="../src/css/app.css">
    <link rel="stylesheet" type="text/css" href="../src/css/home.css">
    <link rel="stylesheet" type="text/css" href="../src/css/recherche.css">
</head>
<body>
   <!-- Header de l'application -->
   <div class="headerApp">
      <!-- left header de l'application -->
      <div class="left">
         <div class="leftTop">
            <div class="btn">
               <i class="fa fa-home fa-2x"></i>
               <a href="homeApp.php" class="bindAccueil" style="color:#CECECE;">Accueil</a>
            </div>
            <div class="btn">
               <i class="fa fa-search fa-2x"></i>
               <a href="rechercheApp.php" class="bindRecherche" style="color:white;font-family: poppinsBold;border-bottom: 4px solid #1ED760;">Recherche</a>
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
            </div><img src="../src/img/logoispm.jpg" style="border-radius:50%;margin-left:10px;margin-top:10px;" class="logoImg">
         </div>
      </div>
      <!-- left header de l'application -->

      <!-- centre header de l'application -->
      <div class="centre">

         <!-- centre Top de l'application -->
         <div class="centreTop">
            <div class="logoSection">
               <i class="fa fa-home fa-2x"></i>
               <p style="font-family: poppinsBold; margin-left: 10px;">
                  <div>
                     <form action="../package/search.php" method="GET">
                     <input type="text" name="search" placeholder="Que souhaitez-vous aller ?" style="border:none;border:1px solid #fff;padding:10px;background-color: #1D1D1D;border-color: white;border-radius: 15px;width: 400px;margin-left: 10px;">
                     <button type="submit" style="border:none;background-color: #1D1D1D;color:white;position: relative;right: 40px;top:3px;"><i class="fa fa-search fa-2x"></i></button>
                  </form>
                  </div>
               </p>
               
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
               <div class="endroitPopulaire" id="started" style="margin-top:50px;margin-left: 25px; font-family:">
                <h1 style='font-size:20px;margin-left:35px;margin-top:15px;'>Les 5 endroits le plus cherchées</h1>
               <div class="endroitsAffichage" style="display:flex;padding-top: 50px;padding-bottom: 100px; flex-wrap: wrap;margin-top: 10px;padding-left: 40px;">
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
   $n = "île";
   $m = "ranomafana";
   $o = "zahamena";
   $sql = "SELECT * FROM endroits WHERE type LIKE '%$n%' OR nom LIKE '%$m%' OR nom LIKE '%$o%' LIMIT 5";
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
               <p class="title">Cherchons quelques préférences auxquels
vous préférez</p>
               <p class="subtitle">Nous vous transmettrons des informations sur les
nouveaux sites touristiques</p>
               <a class="btn_preference" href="app/budgetApp.php">Parcourir les préférences</a>
            </div>
            <!-- preferences section de l'application -->
         </div>
         <!-- right Top de l'application -->
   </div>
</body>
</html>