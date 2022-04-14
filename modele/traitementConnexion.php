<?php
session_start();
require "../modele/connexionBdd.php";
$mail = $_POST["mail"];
$password = $_POST["password"];

/* Ces deux lignes de commandes sont nécessaire à l'inscription, pour stocker le mdp hashé

$password2 = password_hash($_POST["password"],PASSWORD_ARGON2I);
$password3 = '';*/
             


$requete = 'SELECT * FROM user WHERE email = "'.$mail.'"';
$stnt = $pdo->prepare($requete);
$stnt->execute();
$users = $stnt->fetch();
     
             

              

if(!empty($users))
{   
    if(password_verify($password, $users['mdp'])){
        $_SESSION['emailUser'] = $mail;
        $_SESSION['nom'] = $mail;
        $_SESSION['prenom'] = '';
        header('Location:../vue/accueilTD.php'); 
    }else{
        header("Location:../vue/TD Ligue 1.php?Error=motDePasseIncorrect");
    }
}else
{
   header("Location:../vue/TD Ligue 1.php?Error=mailIncorrect");
   
}


?>