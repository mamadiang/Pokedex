<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Inscription</title>
    <link rel="stylesheet" href="pokedex.css">
    <link rel="stylesheet" href="inscription.css">
</head>
<body>
        <div id="pokemon_logo">
                <img src="./images/16.png" alt="" class="pokemon_title">
        </div>

        <div class="register-container">

            
            
            <h1>Inscription</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" name="motdepasse" id="motdepasse" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="M'inscrire" class="submit">
                </div>
            </form>
        </div>
</body>
</html>

<?php

session_start();
 
if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['motdepasse'])) {

    // Connexion à la BDD
    $dsn = 'mysql:dbname=pokedex;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $dbh = new PDO($dsn, $user, $password);

    $sql = "INSERT INTO `utilisateur`( `nom`, `prenom`, `email`,  `mdp`) 
            VALUES ( :nom , :prenom , :email, :mdp )";
    $requete = $dbh->prepare($sql);
    // Hashage du mot de passe
    $mdpHash = $_POST['motdepasse'];
    $requete->execute(array("nom" => $_POST['nom'], "prenom" => $_POST['prenom'],
        "email" => $_POST['email'], "mdp" => $mdpHash
    ));
}
?>
