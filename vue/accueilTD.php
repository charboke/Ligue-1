<!--Protéction de la page en PHP-->
<?php session_start();
if (!isset($_SESSION['emailUser'])) {
    header('Location:TD Ligue 1.php');
}
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';

if (!empty($_POST['search'])) {   
    
    $recherche = $_POST['search'];           
} else {  
    $recherche ="";  
}

/* J'appelle les éléments de ma base via la page fonction*/
$clubs =recupClubs($pdo, $recherche);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <!--Lien d'intégration FontAwesome-->
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/172fddb31a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!--Lien d'intégration bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Lien d'intégration CSS-->
    <link rel="stylesheet" type="text/css" href="../public/css/ALigue.css">
</head>

<body>

    <?php include 'header.php' ?>

    <div class="container-fluid">
        <div class="row" style="padding-top: 20px;">
                       <div class="col-12">
                <div class="titre" style="text-align: center;">ACCUEIL</div>
            </div>
        </div>


        <?php if (isset($_GET["modifOK"])) { ?><p class="alert alert-success">Le club a bien été modifié</p><?php } ?>
        <?php if (isset($_GET["suppOK"])) { ?><p class="alert alert-success">Le club a bien été supprimé</p><?php } ?>
        <div class="row">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card statistique">
                        <div class="card-body">
                            <div class="card-text">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="colonne">Club</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>MJ</th>
                                            <th>MG</th>
                                            <th>MN</th>
                                            <th>MP</th>
                                            <th>BP</th>
                                            <th>BC</th>
                                            <th>DB</th>
                                            <th>Pts</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($clubs as $club) {
                                            $i++ ?>

                                            <tr style="margin: 15px; vertical-align : middle;">
                                                <?php if ($i == 1) { ?> <td style=" border-left: solid 3px blue; text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i == 2) { ?> <td style="  border-left: solid 3px blue;  text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i == 3) { ?> <td style="  border-left: solid 3px orange;  text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i == 4) { ?> <td style="  border-left: solid 3px green;  text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i > 4 and $i < 10) { ?> <td style="  border-left: none; text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i == 10) { ?> <td style=" border-left: solid 3px orange; text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i == 11) { ?> <td style=" border-left: solid 3px red; text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>
                                                <?php if ($i == 12) { ?> <td style=" border-left: solid 3px red; text-align :center;"><?php echo ($i); ?></td>
                                                    </td> <?php } ?>


                                                <td><img class="logo" src="../../upload/<?php echo $club['logo']; ?>"><a class="lien" href="detailClub.php?id=<?= $club['id_club'] ?>"><?php echo $club['nom_club']; ?></a></td>


                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td> <?php echo $club['MJ']; ?> </td>
                                                <td> <?= $club['MG']; ?> </td>
                                                <td> <?php echo $club['MN']; ?> </td>
                                                <td> <?= $club['MP']; ?> </td>
                                                <td> <?php echo $club['BP']; ?> </td>
                                                <td> <?= $club['bc']; ?> </td>
                                                <td> <?php echo $club['dp']; ?> </td>
                                                <td> <?= $club['PTS']; ?> </td>
                                                <td></td>
                                                <td></td>
                                                <td><a href="modif_club.php?id=<?php echo $club['id_club'] ?>"><button id="boutonInfo" type="button" class="btn btn-outline-info">Modifier</button></a> <a onclick="return confirm('Êtes_vous sûr de vouloir supprimer ?')" href="../controller/traitementSuppressionClub.php?id=<?php echo $club['id_club'] ?>"><button type="button" class="btn btn-outline-warning">Supprimer</button></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <!-- <div class=col-2><a href="../controller/infoUser.php"><button class="btn btn-warning">Accès traitement</button></a></div> 
                </div>-->
            </div>
            <script src="../public/js/js2.js"></script>
</body>

</html>