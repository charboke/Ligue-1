<?php
session_start();
require "../modele/connexionBdd.php";
require "../modele/fonction.php";
$mail = $_POST["mail"];
$password = $_POST["password"];
$users = connexion($pdo, $mail);

/* Ces deux lignes de commandes sont nécessaire à l'inscription, pour stocker le mdp hashé

$password2 = password_hash($_POST["password"],PASSWORD_ARGON2I);*/
             
/*echo ('<pre>');            
print_r ($users);
echo ('<pre>'); */


if(!empty($users))
{   
    if(password_verify($password, $users['mdp'])){
        
        $_SESSION['emailUser'] = $mail;
        $_SESSION['nom_user'] = $users['nom_user'];
        $_SESSION['prenom_user'] = $users['prenom_user'];
        $_SESSION['picture_user'] = $users['picture'];
        
        header('Location:../vue/accueilTD.php');
    }else{
        header("Location:../vue/TD Ligue 1.php?Error=motDePasseIncorrect");
    }
}else
{
   header("Location:../vue/TD Ligue 1.php?Error=mailIncorrect");
   
}


?>