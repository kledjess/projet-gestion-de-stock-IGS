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


    $sql = 'DELETE FROM `produit` WHERE `id_reference` = :id_reference; ';

    $query = $db->prepare($sql);

    $query->bindValue(':id_reference', $id_reference, PDO::PARAM_INT);

    $query->execute();

    $_SESSION['message'] = "Produit supprimé";
    header('Location: indexs.php'); 

}else{
    $_SESSION['erreur'] = "url invalide";
    header('Location: indexs.php');
}

?>

