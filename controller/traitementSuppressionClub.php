<?php
session_start();
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';

$id = $_GET["id"];

deleteStat($pdo, $id);
deleteClub($pdo, $id);

header('Location:../vue/accueilTD.php?suppOK');

?>