<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="pokedex.css">
</head>
<body>
    <div id="page">
        
        <div class="register-connect">

            <a href="inscription.php"> 
                <input type="button" value="Inscription" class="register-connect-color">
            </a>

            <a href="connexion.php">
                <input type="button" value="Connexion" class="register-connect-color">
            </a>
        </div>

        <div id="pokemon_logo">
            <img src="./images/16.png" alt="" class="pokemon_title">
        </div>

        <div id="pokeImg">

            <?php

                    require 'database.php';
                    
                    $appeleDeLaFunctionGetPokemon = Database::RecherchePokemon();

                    //var_dump($appeleDeLaFunctionGetPokemon); 

                while($pokemon = $appeleDeLaFunctionGetPokemon->fetch()){
                
                
                    echo '<a href="detailsPokemon.php?id='. $pokemon['num_poke'] . '">';
                    echo '<div class="pokemon-container">';
                    echo '<img src="./images/' . $pokemon['img_poke'] . '">';
                    echo '</div>';
                    echo '</a>';
                    

                echo '<td>' . $pokemon['nom'] . '</td>';
                //echo '<td>' . $pokemon['type'] . '</td>';
                echo '<td>' . $pokemon['competence'] . '</td>';
                echo '<td>' . $pokemon['taille'] . '</td>';
                echo '<td>' . $pokemon['masse'] . '</td>';
                echo '<td>' . $pokemon['attack'] . '</td>';
                echo '<td>' . $pokemon['defence'] . '</td>';
                echo '<td>' . $pokemon['vitesse'] . '</td>';
                echo '<td>' . $pokemon['generation'] . '</td>';
                
                }
            
            ?>
        </div>
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