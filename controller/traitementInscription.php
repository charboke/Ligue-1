<?php
session_start();
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';


$name = $_POST['nom'];
$forname = $_POST['prenom'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$picture = $_FILES['picture'];
$password2 = password_hash($_POST["password"], PASSWORD_ARGON2I);
$user = doublonUsers($pdo, $mail);



if (!$user) {
    inscription($pdo, $name, $forname, $mail, $password2, $picture); 
    header("Location:../vue/TD Ligue 1.php?userOK");
} else {
    header("Location:../vue/inscription.php?userKO");
}

?>
