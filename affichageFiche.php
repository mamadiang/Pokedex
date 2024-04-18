<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit;
}

    $dsn = 'mysql:host=localhost;dbname=back';
    $user = 'root';
    $password = '';

    $connexion = new PDO($dsn, $user, $password);

    // requete affichage fiche
    $sql = "SELECT * FROM fiche";
    $requete = $connexion->prepare($sql);
    $requete->execute();
    $fiches = $requete->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($fiches);

    

    if(isset($_POST['delete_id'])){
    
        // suppression fiche
        $sqlDelete = "DELETE FROM fiche WHERE id = :id";
        $requeteDelete = $connexion->prepare($sqlDelete);

        $requeteDelete->execute(array('id' => $_POST['delete_id']));

        header("Refresh:0");

    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes fiches</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include "menu.php"; ?>

<div class="container mt-5">
    <h2 class="mb-4">Mes fiches</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Date d'ajout</th>
                <th scope="col">Plan</th>
                <th scope="col">Temps de réalisation</th>
                <th scope="col">Complexité</th>
                <th scope="col">Createur</th>

                <th scope="col">Actions</th> <!-- Ajout de la colonne Actions -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fiches as $fiche) : ?>
                <tr>
                    <td><?php echo $fiche['id']; ?></td>
                    <td><?php echo $fiche['titre']; ?></td>
                    <td><?php echo $fiche['description']; ?></td>
                    <td><?php echo $fiche['date_ajout']; ?></td>
                    <td><?php echo $fiche['plan']; ?></td>
                    <td><?php echo $fiche['tpsRea']; ?></td>
                    <td><?php echo $fiche['complexite']; ?></td>
                    <td><?php echo $fiche['createur']; ?></td>
                    <td>
                        <a href="detailfiche.php?id=<?php echo $fiche['id']; ?>" class="btn btn-info btn-sm">Détails</a>
                        <a href="modifierfiche.php?id=<?php echo $fiche['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                        <form method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $fiche['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>