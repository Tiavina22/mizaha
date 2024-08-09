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
    <link rel="shortcut icon" href="src/img/logomizaha.png" type="image/x-icon">
    <link rel="stylesheet" href="src/css/font-awesome.min.css">
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" type="text/css" href="src/css/home.css">
    <style type="text/css">
       *{overflow-y: hidden;}
    </style>
</head>
<body>
   <!-- Header de l'application -->
   <div class="headerApp">

      <!-- left header de l'application -->
      <div class="left">

         <div class="leftTop">
            <div>
               <i class="fa fa-home fa-2x"></i>
               <a href="../index.php" class="bindAccueil">Accueil</a>
            </div>
            <div>
                     <i class="fa fa-search fa-2x"></i>
                     <a href="app/coupureApp.php" target="blank" class="bindRecherche">Recherche</a>
            </div>
         </div>

         <div class="leftFoot">
            <div>
               <div>
                  <i class="fa fa-map-marker fa-2x" style="margin-left: 5px;"></i>
                  <a href="app/coupureApp.php" target="blank" class="bindEndroits" style="margin-left: 40px;">Endroits touristiques</a>
               </div>
               <div>
                  <i class="fa fa-hotel fa-2x"></i>
                  <a href="app/coupureApp.php" target="blank" class="bindHotels" style="margin-left: 26px;">Hôtels</a>
               </div>
               <div>
                  <i class="fa fa-truck fa-2x"></i>
                  <a href="app/coupureApp.php" target="blank" class="bindTransport" style="margin-left: 29px;">Agence de transport</a>
               </div>
               <div>
                  <i class="fa fa-user-secret fa-2x" style="margin-left: 5px;"></i>
                  <a href="app/coupureApp.php" target="blank" style="margin-left: 28px;" class="bindGuides">Guides</a>
               </div>
            </div>

            <!-- budget section de l'application -->
            <div class="budgetSection" style="display: flex;flex-direction: column;">
               <p class="title">Plannifier votre budget</p>
               <p class="subtitle">C'est simple, nous alons vous aider</p>
               <a href="app/coupureApp.php" target="blank">Créer une budget</a>
            </div>
            <!-- budget section de l'application -->

            <!-- preferences section de l'application -->
            <div class="preferenceSection" style="display: flex;flex-direction: column;">
               <p class="title">Cherchons les endroits auxquels
vous préférez</p>
               <p class="subtitle">Nous vous transmettrons des informations sur les
nouveaux sites touristiques</p>
               <a href="app/coupureApp.php" target="_blank">Parcourir les endroits</a>
            </div>
            <!-- preferences section de l'application -->

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
         </div>
      </div>
      <!-- left header de l'application -->

      <!-- right header de l'application -->
      <div class="right">
         <!-- Début right Top de l'application -->
         <div class="rightTop">
            <div class="logoSection">
               <img src="src/img/logo.png" class="logoImg">
               <img src="src/img/logoispm.jpg" style="border-radius:50%;margin-left:10px;" class="logoImg">
               <p class="logoTexte">Mizaha</p>
            </div>
             <div>
               <a href="app/inscriptionApp.php" class="buttonBindInscription">S'inscrire</a>
               <a href="app/connexionApp.php" class="buttonBindConnexion">Se connecter</a>
            </div>
         </div>
         <!-- Fin right Top de l'application -->
         <!-- Début index de l'app -->
         <div class="index_app" style="height: 86%;padding: 20px;padding-bottom: 5px;" >
            <div style="height:100%;overflow-y: scroll;width: 100%;">
            <div style="background-color: #101010;border-radius: 10px;padding: 10px;">
               <h1 style="font-family:poppinsBold;font-size: 20px;color: #1ED760;">Mizaha c'est quoi ?</h1>
               <p style="font-size:16px;color: white;line-height: 25px;margin-top: 10px;">Mizaha est une plateforme de référence pour trouver des bon plans de voyages, les meilleures offres d’hébergement, les séjours et circuits touristiques préférés des touristes à Madagascar, toutes les activités nautiques et terrestres dans les meilleurs spots de l’île, des guides de voyages dans toutes les régions de Madagascar, avec les agents de transports.</p>
            </div>
            <div style="background-color: #101010;border-radius: 10px;padding: 10px;margin-top: 20px;">
               <h1 style="font-family:poppinsBold;font-size: 20px;color: #1ED760;">Quelles sont nos objectifs ?</h1>
               <p style="font-size:16px;color: white;line-height: 25px;margin-top: 10px;">Encourager les voyageurs à venir à Madagascar et leur faire découvrir le meilleur de Madagascar suivant leurs envies avec leurs moyens, leur temps et à leur rythmes. <br>Aider les visiteures qui veulent organiser  leurs voyages à Madagascar en toute facilité et en trouver rapidement le prix le plus intéressant, le meilleur choix de voyage, et les bons prestataires de voyage. <br>Faciliter l’accès aux meilleures offres d’hébergements et vols sur Madagascar. Faciliter l’accès aux informations sur les principales destinations touristiques aimées par les visiteurs, les bons plans voyages et les variétés d’activités les plus pratiquées à Madagascar, ainsi que les guides de voyages.</p>
               <div style="display:flex;flex-direction: row;width: 100%;overflow-x: hidden;padding-bottom: 75px;padding-top: 20px;">
                  <div class="endroitsAffichage" style="display:flex;flex-direction: column; flex-wrap: wrap;margin-top: 10px;width: 50%;margin-left: 25px;">
                     <div>
                        <p style="font-size:16px;font-family:poppinsBold;color: #1ED760;margin-left: 20px;">Top 3 des endroits</p>
                     </div>
                     <div style="display:flex;flex-direction: row;margin-top: 10px;">
                     <?php
                        //connexion à la base de donnée
                        $endroitIndex = "île";
                        include 'config/bd_connexion.php';
                        //Récupération des donées endroits
                        $sql = "SELECT * FROM endroits WHERE type LIKE '%$endroitIndex%' LIMIT 3";
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
                              echo "<a href='app/coupureApp.php' class='endroit-card' style='width:24%;margin-left:15px;background-color:#181818;height:250px;border-radius:15px;padding:10px;margin-top:10px;'>";
                              echo '<div>';
                              echo '<img style="width:98%;height:140px;object-fit:cover;border-radius:10px;" src="package/' . $photoPrincipale . ' ">';
                              echo '<h3 style="margin:0;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
                              echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;line-height:20px;">' . $descriptionShort . '</p>';
                              echo '</div>';
                              echo "</a>";
                           }
                        }else{
                           echo "Aucun endroit trouvé.";
                        }
                        $conn->close();
                     ?>
                     </div>
                  </div>
                  <div class="hotelsAffichage" style="display:flex; flex-wrap: wrap;margin-top: 10px;width: 50%;margin-right: 15px;">
                     <div>
                        <p style="font-size:16px;font-family:poppinsBold;color: #1ED760;margin-left: 20px;">Top 3 des hôtels</p>
                     </div>
                     <div style="display:flex;flex-direction: row;margin-top: 10px;">
                     <?php
                        //connexion à la base de donnée
                        include 'config/bd_connexion.php';
                        //Récupération des donées endroits
                        $sql = "SELECT * FROM hotels LIMIT 3";
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
                              $descriptionShort = implode(' ', array_slice(explode(' ', $description), 0, 11)) . " ...";

                              //Affichage de la carte de l'hotel
                              echo "<a href='app/coupureApp.php' class='endroit-card' style='width:24%;margin-left:15px;background-color:#181818;height:250px;border-radius:15px;padding:10px;margin-top:10px;'>";
                              echo '<div>';
                              echo '<img style="width:98%;height:140px;object-fit:cover;border-radius:10px;" src="package/' . $photoPrincipale . ' ">';
                              echo '<h3 style="margin:0;font-size:13px;font-family:poppinsBold;">' . $nom . '</h3>';
                              echo '<p style="margin:0;font-size:11px;color:#CECECE;font-family:poppins;line-height:20px;">' . $descriptionShort . '</p>';
                              echo '</div>';
                              echo "</a>";
                           }
                        }else{
                           echo "Aucun endroit trouvé.";
                        }
                        $conn->close();
                     ?>
                     </div>
                  </div>
               </div>
            </div>
            <div style="background-color: #101010;border-radius: 10px;padding: 10px;margin-top: 10px;">
               <h1 style="font-family:poppinsBold;font-size: 20px;color: #1ED760;">Nos avantages ?</h1>
               <div style="display:flex;flex-direction: row;padding: 10px;margin-top: 10px;">
                  <div style="background-color:#101010;padding: 10px;border-radius: 10px;">
                     <p style="color:#fff;line-height: 25px;">Accès facile, rapide et efficace vers les meilleures offres sur Madagascar : plateforme
                     complet présentant sur une même plateforme les meilleurs sites de voyage et moteurs
                     de recherches sur internet dont Booking, qui détient 40% du marché du tourisme.
                     Plus besoin de consulter plusieurs sites pour trouver un vol, hôtel, ou activités ou
                     séjours pas cher sur Madagascar : tous les besoins de l’internaute qui souhaite
                     voyager à Madagascar est réuni sur une même plateforme.</p>
                  </div>
                  <div style="background-color:#101010;padding: 10px;margin-left: 20px;border-radius: 10px;">
                     <p style="color:#fff; line-height: 25px;">Plateforme efficace pour le choix des voyages car il démontre les circuits touristiques
                     essentiels les plus pratiqués à Madagascar avec un large choix de devis et de
                     prestataires, présentés d’une manière claire, pratique et facile à utiliser. Le site est plus
                     varié, et objectif dans ses offres, avec un plus grand choix de partenaires touristiques
                     par rapport aux autres sites de voyages à Madagascar. Les offres sont bien sélectionnées et
                     mieux présentées, riches en termes d’image, de choix de voyages qui donne envie de
                     voyager. Les circuits, séjours et activités touristiques sont diversifiés et catégorisés
                     convenablement par destination, de prix et de qualité de voyages; en même temps
                     l’internaute peut consulter sur le même plateforme les hôtels, les vols ou les transports et les guides de
                     voyage qui lui convient.</p>
                  </div>
               </div>
            </div>
            <div style="background-color: #101010;border-radius: 10px;padding: 10px;margin-top: 10px;">
               <h1 style="font-family:poppinsBold;font-size: 20px;color: #1ED760;">Pourquoi les clients passeront par Mizaha ?</h1>
               <div style="display:flex;flex-direction: row;padding: 10px;margin-top: 10px;">
                  <div style="background-color:#181818;padding: 10px;border-radius: 10px;width: 37.5%;">
                     <p style="color:#fff;line-height: 25px;">Parce que ça économise leur temps, de l’énergie, et ils trouveront les meilleures prix sur
                     Internet, ils ont tout à porter de main sur une seule plateforme, avec des liens directs aux
                     destinations principales à Madagascar. Ils n’ont plus besoin de consulter d’autres sites internet
                     pour voyager à Madagascar et ils bénéficient de nos conseils et assistance ainsi que de nos
                     réseau de partenaires locaux avec qui Mizaha entretien des relations régulières et personnalisés.</p>
                  </div>
                  <div style="background-color:#181818;padding: 10px;margin-left: 20px;border-radius: 10px;width: 62.5%;">
                     <p style="color:#fff; line-height: 25px;">Parce que Mizaha leur offre un service plus assistant et  personnalisé dans la recherche de la
                     meilleure offre au meilleur prix avec un contact direct avec les bons prestataires. Le service
                     de comparaison de devis entre les divers prestataires bien évalués constitue le point fort de
                     nos service. Il y a plus d’une centaine de prestataires touristiques à Madagascar avec plus
                     d’une cinquantaine d’offres à chacun, c’est difficile de faire son choix quand on est dans un
                     pays inconnu. Mizaha leur offre la possibilité d’avoir le meilleur choix, l’orientation, la garantie du
                     meilleur prix ainsi que le suivi des prestations de service, ainsi qu’une nouvelle
                     recommandation en cas d’insatisfaction avant l’exécution du contrat.</p>
                  </div>
               </div>
            </div>
            </div>
            </div>
         </div>
         <!-- Fin index de l'app -->
      </div>
   </div>
   <!-- Début footer de l'application -->
   <div class="footerApp">
      <div>
         <div>EXTRAIT SUR MIZAHA</div>
         <p>Inscrivez-vous pour visiter les endroits ou sites en illimités, avec quelques coupures. Pas besoin de carte credit</p>
      </div>
      <div>
         <a href="app/inscriptionApp.php" class="bindInscription">S'inscrire gratuitement</a>
      </div>
   </div>
   <!-- Fin footer de l'application -->
</body>
</html>