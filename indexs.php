 <?php

session_start();
 
    require_once('database.php');

    $sql =  "SELECT * FROM produit";

    $query = $db->prepare($sql);

    $query->execute();
    $result = $query->fetchAll( PDO::FETCH_ASSOC);


    require_once('deconnexion.php');
 ?>
 
 
 <!DOCTYPE html>
<html lang="fr">
    <meta charset="utf-8">
<head>
        <title>Le gestionnaire !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="admin">
<main class="container">
    <div class="row">
        <section class="col-12">

        <?php 
       if(!empty($_SESSION['erreur'])){
           echo '<div class="alert alert-danger" role="alert">
           ' . $_SESSION['erreur'].'</div>';

           $_SESSION['erreur'] ="";
       }

?>
      <?php 
       if(!empty($_SESSION['message'])){
           echo '<div class="alert alert-success" role="alert">
           ' . $_SESSION['message'].'</div>';

           $_SESSION['message'] ="";
       }

?>

            <h1> Liste des produits  <a href="add.php" class="btn btn-success">+Ajouter</a>  
            <button style="margin-left: 170px;background:red;" class="btn btn-red">
            <a style='color:white;font-weight: bold;font-size: 20px' href="inscription.php">Se déconnecter </a> </button></a></h1>
            <table class="table">
                <thead>
                    <th>id_reference</th>
                    <th>libelle</th>
                    <th>quantite_minimale</th>
                    <th>quantite_en_stock</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                    
                    foreach($result as $libelle)
                    {
                    ?>
                    <tr>
                        <td> <?= $libelle['id_reference']?></td>
                        <td> <?= $libelle['libelle']?></td>
                        <td> <?= $libelle['quantite_minimale']?></td>
                        <td> <?= $libelle['quantite_en_stock']?></td>
                        <td><a href="detail.php?id_reference=<?= $libelle['id_reference']?>"><button class="btn btn-success">voir </button></a></td>
                         <td> <a href="edit.php ?id_reference=<?= $libelle['id_reference']?>"><button class="btn btn-primary"> Modifier</button></a></td> 
                        <td> <a href="delete.php ?id_reference=<?= $libelle['id_reference']?>"><button class="btn btn-warning"> Supprimer </button></a></td>

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

</main>

</div>
    </body>
</html> 