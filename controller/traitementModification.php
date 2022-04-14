<?php
session_start();
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';

$id = $_POST["nom_club"];
$nom = $_POST['modif_club'];
$ville = $_POST['ville_club'];
$logo = $_FILES['logo_club'];

if (!empty($nom)){

    updateClub($pdo, $id, $nom, $ville, $logo);
    header('Location:../vue/accueilTD.php?modifOK');
    
}else{
    header('Location : ../vue/accueilTD.php?modifKO');
}
?>