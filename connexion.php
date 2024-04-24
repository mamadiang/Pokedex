<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Connexion</title>
    <link rel="stylesheet" href="pokedex.css">
    <link rel="stylesheet" href="inscription.css">
    <style>
    </style>
</head>
<body>

    <div id="user">
                <img src="./images/user.png" alt="" class="profil">
     </div>

    <div class="register-container">

        <form action="" method="POST">

            <div class="form-group">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="motdepasse">Mot de passe</label>
                <input type="password" name="motdepasse" id="motdepasse" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Me connecter" class="submit">
                </div>
        
        </form>

    </div>

    <footer>
            <div class="separator"></div>

            <div id="footer-container">
            <p>Pokedex</p> 
            <span>©Mamad</span>
            </div>
    </footer>

</body>
</html>

<?php
if(isset($_POST["email"] , $_POST["motdepasse"])){

    $dsn = 'mysql:dbname=pokedex;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM `utilisateur` WHERE `email` LIKE :email ";
    $requete = $dbh->prepare($sql);

    $requete->execute(array("email" => $_POST["email"] ) );
    // on récupère le premier résultat
    $resultat = $requete->fetch();

    var_dump($_POST["email"]);

    if ($resultat != false){
        // on verifie le mot de passe
        $mdpHash = $resultat['mdp'];
       //if (password_verify( $_POST['motdepasse'], $mdpHash)) {
            echo 'Le mot de passe est valide !';
            // on peut connecter notre utilisateur
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["prenom"] = $resultat['prenom'];
            header("Location: ajoutFiche.php");
        } 

    }
?>
