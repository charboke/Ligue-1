<!--Protéction de la page en PHP-->
<?php session_start();
if (!isset($_SESSION['emailUser'])) {
    header('Location:../vue/TD Ligue 1.php');
}
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';
/* J'appelle les éléments de ma base via la page fonction*/
$details =  recupDetails($pdo, $_GET['id']);

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
    <link rel="stylesheet" type="text/css" href="">

</head>
<style>
    h1 {
        font-weight: bold;
        color: white;
        padding-left: 200px;
        margin-top: 2em;        
    }

    body {
        background-image: url(../public/images/ligue1.jpg);
    }

    .ligne1 {
        padding-top: 100px;
    }

    .carte1 {
        border-radius: 50px;
    }

    .texte1 {
        text-align: center;
    }
</style>

<body>
    <?php include 'header.php' ?>
    <div class="row">
        <div class="col-10"><h1>Statistiques détaillées du Club <?= $details['nom_club'] ?></h1></div>
    </div>
    <div class="container">           
        <div class="row ligne1 justify-content-center">
            <div class="col-6"></div>
            <div class=" col-6">
                <div class="card carte1">
                    <div class="card-body texte1">
                        <h3>Nombre de matchs joués : <?= $details['MJ'] ?></h3>
                        <h3>Nombre de matchs gagnés : <?= $details['MG'] ?></h3>
                        <h3>Nombre de matchs nuls : <?= $details['MN'] ?></h3>
                        <h3>Nombre de matchs perdus : <?= $details['MP'] ?></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>




</body>

</html>