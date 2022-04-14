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
    <link rel="stylesheet" type="text/css" href="../public/css/indexa.css ">

</head>

<body>

    <div class="container" style="text-align: center;">
        <div class="row">
            <div class="col-12">
                <div class="titre">Accéder à la Ligue 1</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 id="titre2">Pour accéder au classement de la Ligue1 <br> veuillez vous connecter</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <?php if (isset($_GET["Error"])) { ?> <p class="alert alert-danger">Les identifiants saisis sont incorrects</p> <?php } ?>

                    <?php if (isset($_GET["userOK"])) { ?><p class="alert alert-success">Votre compte a été crée avec succès</p><?php } ?>

                    <div class="col-lg-8 col-md-12">
                        <div style="text-align: left !important;" id="errorId"></div><br>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-5 col-md-7 col-sm-9">
                        <form action="../controller/traitementConnexion.php" method="POST">

                            <div class="input-group mb-3" style="border-radius: 50px !important;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="mail" id="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                            </div>


                            <div class="input-group mb-3" style="border-radius: 50px !important;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock" style="border-radius: 50px !important;"></i></span>
                                </div>
                                <input type="password" onclick="connexion()" name="password" id="passwrd" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                            </div>
                            <br>
                            <button type="submit" id="bouton">SIGN UP</button>
                        </form>
                        <?php if (!isset($_GET["userOK"])) { 
                        ?> 
                            <hr><span id=""> Vous n'êtes pas encore inscrit </span> <hr> 
                            <a href='inscription.php'><button id="bouton">Inscription</button></a>

                        <?php
                        }
                        ?>

                    </div>
                </div>

            </div>


        </div>
        <script src="../public/js/js3.js"></script>
    </div>

</body>

</html>