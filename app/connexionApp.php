
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mizaha</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/App.css">
    <link rel="stylesheet" href="../src/css/connexion.css">
</head>
<body>
    <div class="login">
        <h1 class="textTitle">J'ai un compte Mizaha</h1>
        <div class="ligne"></div>
        <form method="POST" action="../package/connexion.php">
            <label for="email">Adresse e-mail ou nom d'utilisateur</label><br>
            <input type="email" name="email" placeholder="Adresse e-mail ou nom d'utilisateur" required><br>
            <label for="mdp">Mot de passe</label><br>
            <input type="password" name="mdp" placeholder="Mot de passe" required><br>
            <button type="submit" name="inscrire">Se Connecter</button>
        </form>
        <p><a href="../app/mdpOublie.php" class="textOublie">Mot de passe oublié ?</a></p>
        <div class="ligne"></div>
        <p>Vous n'avez pas de compte ? <a href="inscriptionApp.php" class="textAInscrire"> Je n'ai pas Mizaha</a></p>
    </div>
</body>
</html>