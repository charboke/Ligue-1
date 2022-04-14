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
    <link rel="stylesheet" type="text/css" href="../public/css/indexInscription.css ">

</head>

<body>

    <div class="container" style="text-align: center;">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card inscription">
                    <div class="card-body">
                        <div class="card-text">

                            <div class="titre">Inscription</div>

                            <h3 id="titre2">Inscrivez vous gratuitement et retrouvez tous les classements de la Ligue 1</h3>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <?php

                                    if (isset($_GET["userKO"])) {

                                    ?>

                                        <p class="alert alert-danger">Cette adresse mail existe déjà</p>

                                    <?php
                                    }
                                    ?>
                                    <div class="col-7">
                                        <div style="text-align: left !important;" id="errorId"></div><br>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-5">
                                            <form action="../controller/traitementInscription.php" method="POST" enctype="multipart/form-data">

                                                <div class="input-group mb-3" style="border-radius: 50px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" name="nom" id="email" class="form-control" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                                                </div>

                                                <div class="input-group mb-3" style="border-radius: 50px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" name="prenom" id="email" class="form-control" placeholder="Prenom" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                                                </div>

                                                <div class="input-group mb-3" style="border-radius: 50px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" name="mail" id="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                                                </div>


                                                <div class="input-group mb-3" style="border-radius: 50px !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-lock"></i></span>
                                                    </div>
                                                    <input type="password" name="password" onclick="connexion()" id="email" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;" required>
                                                </div>

                                                <div class="input-group" style="border-radius: 50px !important;">
                                                    <div class="input-group-prepend" style="border-radius: 50px !important;">
                                                        <span class="input-group-text" name="logo_club" id="inputGroupFileAddon01"><i class="fas fa-upload"></i></span>
                                                    </div>
                                                    <div class="custom-file" style="border-radius: 50px !important;">
                                                        <input type="file" onclick="validation()" name="picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" style="border-radius: 50px !important;">
                                                    </div>
                                                </div>
                                                <br>

                                                <button type="submit" id="bouton" class="form-control">Inscription</button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr><span id="">Déjà inscrit ? </span>
                                    <hr>
                                    <a href='TD Ligue 1.php'><button id="bouton">Connexion</button></a>
                                </div>

                            </div>

                        </div>



                    </div>
                </div>

            </div>


        </div>
        <script src="../public/js/js3.js"></script>
    </div>

</body>

</html>