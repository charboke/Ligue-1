<?php session_start();
if (!isset($_SESSION['emailUser'])) {
    header('Location:TD Ligue 1.php');
}
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';
/* J'appelle les éléments de ma base via la page fonction*/
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!--Lien d'intégration FontAwesome-->

    <script src="https://kit.fontawesome.com/172fddb31a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!--Lien d'intégration bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Lien d'intégration CSS-->
    <link rel="stylesheet" type="text/css" href="../public/css/infoUser.css ">

</head>

<body>
    <?php include 'header.php' ?>

    <div class="container" style="text-align: center;">
        <div class="row">
            <div class="col-12">
                <div class="titre">Information Utilisateur</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <img class="card-img-top" src="../../upload/<?php echo $_SESSION['picture_user'] ?>" alt="Photo Profil">
                        <div class="card-body">
                            <?php
                            echo "Nom utilisateur : ";
                            echo $_SESSION['nom_user'];
                            echo '<br>';
                            echo "Prenom utilisateur : ";
                            echo $_SESSION['prenom_user'];
                            echo '<br>';
                            echo "Email utilisateur : ";
                            echo $_SESSION['emailUser'];
                            echo '<br>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../public/js/js3.js"></script>
</body>

</html>