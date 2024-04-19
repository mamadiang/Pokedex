<?php
session_start();


$id_pokemon = $_GET['id'];


    $dsn = 'mysql:host=localhost;dbname=pokedex';
    $user = 'root';
    $password = '';

    $connexion = new PDO($dsn, $user, $password);

    // requete detail pokemon
    $sql = "SELECT * FROM pokemon WHERE num_poke = :id";

    $requete = $connexion->prepare($sql);
    $requete->execute(array('id'=>$id_pokemon));
    $pokemon = $requete->fetch();


    //var_dump($pokemon);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la fiche</title>
    <link rel="stylesheet" href="pokedex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div id="page">
        <div id="pokemon_logo">
            <img src="./images/16.png" alt="" class="pokemon_title">
        </div>

        <div class="container mt-5">
            <h2 class="mb-4">Détails Pokemon</h2>
            <div class="card">
                <div class="card-body">
            
                    <?php
                    echo '<a href="detailsPokemon.php?id=' . $pokemon['num_poke'] . '">';
                    echo '<img src="./images/' . $pokemon['img_poke'] . '"> </a>';
                    ?>
                    <!-- <h5 class="card-title"> <?php //echo $pokemon['titre']; ?></h5> -->
                    <p class="card-text"><?php echo $pokemon['nom']; ?></p>
                    <p class="card-text"><strong>Competence:</strong> <?php echo $pokemon['competence']; ?></p>
                    <p class="card-text"><strong>Taille:</strong> <?php echo $pokemon['taille']; ?></p>
                    <p class="card-text"><strong>Masse:</strong> <?php echo $pokemon['masse']; ?></p>
                    <p class="card-text"><strong>attack:</strong> <?php echo $pokemon['attack']; ?></p>
                    <p class="card-text"><strong>Defence:</strong> <?php echo $pokemon['defence']?>
                    <p class="card-text"><strong>Vitesse:</strong> <?php echo $pokemon['vitesse']?>
                    <p class="card-text"><strong>Generation:</strong> <?php echo $pokemon['generation']?>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 