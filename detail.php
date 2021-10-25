<?php
session_start();

if(isset($_GET['id_reference']) && !empty($_GET['id_reference'])){
    require_once('database.php');
    $id_reference = strip_tags($_GET['id_reference']);

    $sql = 'SELECT * FROM `produit` WHERE `id_reference` = :id_reference; ';

    $query = $db->prepare($sql);

    $query->bindValue(':id_reference', $id_reference, PDO::PARAM_INT);

    $query->execute();

    $libelle = $query->fetch();
    if(!$libelle){
        $_SESSION['erreur'] = "cette id_reference n'existe pas";
    header('Location: indexs.php'); 
    }

}else{
    $_SESSION['erreur'] = "url invalide";
    header('Location: indexs.php');
}

?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
<head>
        <title>Les details !</title>
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

           <h1> Détails du produit <?= $libelle['libelle']?></h1>
           <p> id_reference : <?= $libelle['id_reference']?></p>
           <p> quantite_minimale : <?= $libelle['quantite_minimale']?></p>
           <p> quantite_en_stock: <?= $libelle['quantite_en_stock']?></p>
           <a href="indexs.php"class="btn btn-success">Retour</a>

               
           </section>
       </div>
   </main>
</div>
    </body>
</html> 