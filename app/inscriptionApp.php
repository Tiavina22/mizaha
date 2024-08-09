<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription sur mizaha</title>
    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/App.css">
    <link rel="stylesheet" type="text/css" href="../src/css/inscription.css">
</head>
<body>
    <div class="inscription">
        <div class="logoSection">
            <img src="../src/img/logo.png" class="logoImg">
            <p class="textLogo">Mizaha</p>
        </div>
        <h1>Inscrivez-vous gratuitement pour partir à l'aventure</h1>
        <div class="ligne"></div>
        <p>Inscrivez-vous avec votre adresse e-mail</p>
        <form action="../package/inscription.php" method="POST" enctype="multipart/form-data">
            <label for="email">Quelle est votre adresse e-mail ?</label><br>
            <input type="email" name="email" placeholder="Saisissez votre adresse e-mail" required><br>
            <label for="nom">Comment doit-on vous appeler ?</label><br>
            <input type="text" name="nom" placeholder="Saisissez un de profil complet"><br>
            <span>Celui-ci apparait sur votre profil</span><br>
            <label for="pays">Quelle est votre pays d'origine ?</label><br>
            <input type="text" name="pays" placeholder="Saisissez votre pays" required><br>
            <label for="adresse">Quelle est votre adresse actuellement ?</label><br>
            <input type="text" name="adresse" placeholder="Saisissez votre adresse" required><br>
            <label for="nationalite">De quelle nationalité êtes vous ?</label><br>
            <input type="text" name="nationalite" placeholder="Saisissez votre nationalité" required><br>
            <label for="mdp">Créez un mot de passe mémorisable</label><br>
            <input type="password" name="mdp" placeholder="Saisissez un mot de passe" required><br>
            <label for="naissance">Quelle est votre date de naissance ?</label><br>
            <div class="naissanceSection">
                <div class="naissance">
                    <label>Jour</label><br>
                    <input type="number" name="jour" placeholder="JJ">
                </div>
                <div class="naissance">
                    <label>Mois</label><br>
                    <select name="mois">
                        <option value="Janvier">Janvier</option>
                        <option value="Février">Février</option>
                        <option value="Mars">Mars</option>
                        <option value="Avril">Avril</option>
                        <option value="Mai">Mai</option>
                        <option value="Juin">Juin</option>
                        <option value="Juillet">Juillet</option>
                        <option value="Aôut">Aôut</option>
                        <option value="Septembre">Septembre</option>
                        <option value="Octobre">Octobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Décembre">Décembre</option>
                    </select>
                </div>
                <div class="naissance">
                    <label>Année</label><br>
                    <input type="number" name="annee" placeholder="AAAA">
                </div>
            </div>
            <label for="photoProfile">Avez-vous une photo de profile ?</label><br>
            <input type="file" id="photoProfile" name="photoProfile"required><br>
            <label for="sexe">Quelle est votre sexe ?</label><br>
            <input type="text" name="sexe" placeholder="M ou F" required><br>
            <div class="sectionAccept">
                <div>
                    <input type="checkbox" name="reception">
                    <label for="reception">J'accepte de recevoir des actualités et des offres de Mizaha</label>
                </div>
                <div>
                    <input type="checkbox" name="donnee">
                    <label for="donnee">Partagez les données sur mon inscription avec le communauté de Mizaha à des fins de développement</label>
                </div>
            </div>
            <div class="texteSection">
                <p class="texte">En cliquant sur le bouton d'inscription, vous acceptez les <a href="#">conditions générales d'utilisation de Mizaha</a></p>
                <p class="texte">Pour en savoir plus sur la façon dont Mizaha recueille, utilise, partage et protège vos données personnelles, veuillez <a>Politique de confidentialité de Mizaha</a></p>
                <button type="submit" name="inscrire">S'inscrire</button>
            </div>
        </form>
        <p class="directionConnexionTexte">Vous avez déja un compte ? <a href="connexionApp.php">Connectez-vous</a></p>
        <div class="null"></div>
    </div>

</body>
</html>