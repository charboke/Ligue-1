<?php
session_start();
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';

$id_club1 = $_POST['nom_club1'];
$id_club2 = $_POST['nom_club2'];
$bp1 = $_POST['but1'];
$bp2 = $_POST['but2'];
$db = ($bp1 - $bp2);

if ($db > 0) {
    $bc1 = $_POST['but2'];
    $bc2 = $_POST['but1'];
    $pts1 = 3;
    $mg1 = 1;
    $mp1 = 0;
    $mn1 = 0;
    $pts2 = 0;
    $mg2 = 0;
    $mp2 = 1;
    $mn2 = 0;
}

if ($db == 0) {
    $bc1 = $_POST['but2'];
    $bc2 = $_POST['but1'];
    $pts1 = 1;
    $mg1 = 0;
    $mp1 = 0;
    $mn1 = 1;
    $pts2 = 1;
    $mg2 = 0;
    $mp2 = 0;
    $mn2 = 1;
}



ajoutGagnant($pdo, $mg1, $mn1, $mp1, $bp1, $bc1, $db, $pts1, $id_club1);
ajoutGagnant($pdo, $mg2, $mn2, $mp2, $bp2, $bc2, $db, $pts2, $id_club2);

header("Location:../vue/ajout_rencontre.php?rencontreOK");


/*
if ($bp > $bc){

    $pts = 3;
    $mg = 1;
}elseif($bp == $bc){

    $pts = 1;
    $mn = 1;
}else{

    $mp = 1;
}*/
