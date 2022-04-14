<?php
session_start();
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';


$nom_club_ajout = $_POST['nom_club'];
$nom_ville_ajout = $_POST['ville_club'];
$logo = $_FILES['logo_club'];
$clubs = doublon($pdo, $nom_club_ajout);


if (!$clubs) {
    
    ajoutClub($pdo, $nom_club_ajout, $nom_ville_ajout, $logo);
    header("Location:../vue/ajout_club.php?clubOK");  
      
} else {  

    header("Location:../vue/ajout_club.php?clubKO");
}

?>


