<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokedex.css">
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="pokedex.css">
    <title>Mon Equipe</title>
</head>
<body>

    <div class="team">

        <h1 class="choose">Je crée mon Equipe</h1>
        <h1 class="choose">Mon Equipe</h1>

    </div>

    <div class="chooser">
        <img src="./images/user.png" alt="">
    </div>

    <?php

        require 'database.php';

        $appeleDeLaFunctionGetPokemon = Database::RecherchePokemon();

        while($pokemon = $appeleDeLaFunctionGetPokemon->fetch()){

            echo '<div class="team-png-post">' ;
            echo '<img class="team-png" src="./images/' . $pokemon['img_poke'] . '">';
            echo '</div>';
        }
    
    
    ?>








    <footer>

         <div class="separator"> </div>

        <div id="footer-container">

            <p>Pokedex</p> 
            <span>©Mamad</span>

        </div>

    </footer>
</body>
</html>

