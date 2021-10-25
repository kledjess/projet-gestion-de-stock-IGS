<?php

session_start();

if($_POST){
   if(isset($_POST['id_reference']) && !empty($_POST['id_reference'])
   && isset($_POST['libelle']) && !empty($_POST['libelle'])
   && isset($_POST['quantite_minimale']) && !empty($_POST['quantite_minimale'])
   && isset($_POST['quantite_en_stock']) && !empty($_POST['quantite_en_stock'])){

    require_once('database.php');

    $id_reference = strip_tags($_POST['id_reference']);
    $libelle = strip_tags($_POST['libelle']);
    $quantite_minimale = strip_tags($_POST['quantite_minimale']);
    $quantite_en_stock = strip_tags($_POST['quantite_en_stock']);

    $sql = 'INSERT INTO `produit` (`id_reference`,`libelle`, `quantite_minimale`, `quantite_en_stock`) VALUES
     (:id_reference,:libelle, :quantite_minimale, :quantite_en_stock); ';

     $query = $db->prepare($sql);

     $query->bindValue(':id_reference', $id_reference, PDO::PARAM_STR);
     $query->bindValue(':libelle', $libelle, PDO::PARAM_STR);
     $query->bindValue(':quantite_minimale', $quantite_minimale, PDO::PARAM_STR);
     $query->bindValue(':quantite_en_stock', $quantite_en_stock, PDO::PARAM_STR);

     $query->execute();

     $_SESSION['message'] = "produit ajouté";
     require_once('deconnexion.php');

     header('Location: indexs.php');
     
   }else{
       $_SESSION['erreur'] = "le formulaire est incomplet";
   }
}


?>
 
 
 <!DOCTYPE html>
<html>
    <meta charset="utf-8">
<head>
        <title>ajouter un produit !</title>
        <meta charset="utf-8"/>
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
           echo '<div class="alert alert-success" role="alert">
           ' . $_SESSION['erreur'].'</div>';

           $_SESSION['erreur'] ="";
       }  

?>

            <h1> ajouter un produit </h1>

            <form method="post" action="">
            <div class="form-group">
                    <label for="id_reference">id_reference :</label>
                    <input type="text" id="id_reference" name="id_reference" class="form-control">
                </div>
                <div class="form-group">
                    <label for="libelle">libelle :</label>
                    <input type="text" id="libelle" name="libelle" class="form-control">
                </div>

                <div class="form-group">
                <label for="quantite_minimale">quantite_minimale :</label>
                    <input type="quantite_minimale" id="quantite_minimale" name="quantite_minimale" class="form-control">
                </div>

                <div class="form-group">
                <label for="quantite_en_stock">quantite_en_stock :</label>
                    <input type="text" id="quantite_en_st" name="quantite_en_stock" class="form-control">
                </div>
                     <button class="btn btn-primary">ENVOYER</button>
            </form>
           
        </section>
    </div>

</main>

</div>
    </body>
</html> 