<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit;
}

$id_fiche = $_GET['id'];

    $dsn = 'mysql:host=localhost;dbname=back';
    $user = 'root';
    $password = '';

    $connexion = new PDO($dsn, $user, $password);

    // requete detail fiche
    $sql = "SELECT * FROM fiche WHERE id = :id";

    $requete = $connexion->prepare($sql);
    $requete->execute(array('id'=>$id_fiche));
    $fiche = $requete->fetch();

    //var_dump($fiche);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la fiche</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Détails de la fiche</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $fiche['titre']; ?></h5>
            <p class="card-text"><?php echo $fiche['description']; ?></p>
            <p class="card-text"><strong>Date d'ajout:</strong> <?php echo $fiche['date_ajout']; ?></p>
            <p class="card-text"><strong>Plan:</strong> <?php echo $fiche['plan']; ?></p>
            <p class="card-text"><strong>Temps de réalisation:</strong> <?php echo $fiche['tpsRea']; ?></p>
            <p class="card-text"><strong>Complexité:</strong> <?php echo $fiche['complexite']; ?></p>
            <p class="card-text"><strong>Créateur:</strong> <?php echo $fiche['createur']?>
        </div>
    </div>
</div>

</body>
</html>