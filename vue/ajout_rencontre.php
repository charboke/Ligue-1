<!--Protéction de la page en PHP-->
<?php session_start();
if (!isset($_SESSION['emailUser'])) {
  header('Location:TD Ligue 1.php');
}
/**J'appelle ma Base de données**/
require '../modele/connexionBdd.php';
/**J'appelle  ma page fonction**/
require '../modele/fonction.php';
/* J'appelle les éléments de ma base via la page fonction*/
$clubs = recupListeClubs($pdo);
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
  <link rel="stylesheet" type="text/css" href="../public/css/indexAjoutRenc.css">
</head>

<body>

  <?php include 'header.php' ?>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="titre" id="titre" style="text-align: center;">Ajouter une rencontre</div>
      </div>
    </div>
    <?php if (isset($_GET["rencontreOK"])) { ?><p class="alert alert-success">La rencontre a été ajoutée avec succès ! </p><?php } ?>

    <div class="choix" id="choix">
      <div class=" row card2 justify-content-center">
        <div class="col-3">
          <div class="card formulaire2">
            <img class="card-img-top" src="../public/images/coupe.jpg" alt="Image Coupe Ligue 1" onclick=afficheCache1()>
            <div class="card-body corpsFormulaire2">
              <p class="card-text">Un gagnant ?</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card formulaire2">
            <img class="card-img-top" src="../public/images/matchNul.jpg" alt="Image Match Nul" onclick=afficheCache2()>
            <div class="card-body corpsFormulaire2">
              <div class="card-text">Ou match nul ?</div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="info" id="info">



      <div class=" row principale" >
        <div class="col-12">
          <div class="card formulaire">
            <form action="../controller/traitementAjout_rencontre.php" method="POST">


              <div class="row secondaire">
                <div class="col-5">
                  <div class="card formulaire">
                    <div class="card-body corpsFormulaire">
                      <div class="card-text">

                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-city"></i></span>
                          </div>
                          <select type="select" required name="nom_club1" id="email" class="form-select" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                            <option selected>Club gagnant</option>
                            <?php
                            $i = 0;
                            foreach ($clubs as $club) {
                              $i++ ?>

                              <option value=<?= $club["id_club"] ?>><?= $club["nom_club"] ?></option>

                            <?php } ?>
                          </select>
                        </div>


                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-calendar"></i> </span>
                          </div>
                          <input type="number" required name="but1" id="passwrd" min="0" class="form-control" placeholder="Nombre de buts" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>





                <div class="col-1" id="vs1">
                  <hr>
                  <h2 id="vs2">VS</h2>
                  <hr>
                </div>

                <div class="col-5">
                  <div class="card formulaire">
                    <div class="card-body corpsFormulaire">
                      <div class="card-text">
                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-city"></i></span>
                          </div>
                          <select type="select" required name="nom_club2" id="email" class="form-select" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                            <option selected>Adversaire</option>


                            <?php
                            $i = 0;
                            foreach ($clubs as $club) {
                              $i++ ?>

                              <option value=<?= $club["id_club"] ?>><?= $club["nom_club"] ?></option>

                            <?php } ?>
                          </select>
                        </div>

                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-calendar"></i> </span>
                          </div>
                          <input type="number" required name="but2" id="passwrd" min="0" class="form-control" placeholder="Nombre de buts" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <button type="submit" id="bouton" class="form-control">Ajouter la rencontre</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="info" id="nul">



      <div class=" row principale" >
        <div class="col-12">
          <div class="card formulaire">
            <form action="../controller/traitementAjout_rencontre.php" method="POST">


              <div class="row secondaire">
                <div class="col-5">
                  <div class="card formulaire">
                    <div class="card-body corpsFormulaire">
                      <div class="card-text">

                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-city"></i></span>
                          </div>
                          <select type="select" required name="nom_club1" id="email" class="form-select" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                            <option selected>Club 1</option>
                            <?php
                            $i = 0;
                            foreach ($clubs as $club) {
                              $i++ ?>

                              <option value=<?= $club["id_club"] ?>><?= $club["nom_club"] ?></option>

                            <?php } ?>
                          </select>
                        </div>


                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-calendar"></i> </span>
                          </div>
                          <input type="number" required name="but1" id="passwrd" min="0" class="form-control" placeholder="Nombre de buts" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>





                <div class="col-1" id="vs1">
                  <hr>
                  <h2 id="vs2">VS</h2>
                  <hr>
                </div>

                <div class="col-5">
                  <div class="card formulaire">
                    <div class="card-body corpsFormulaire">
                      <div class="card-text">
                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px !important;"><i class="fas fa-city"></i></span>
                          </div>
                          <select type="select" required name="nom_club2" id="email" class="form-select" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                            <option selected>Club 2</option>


                            <?php
                            $i = 0;
                            foreach ($clubs as $club) {
                              $i++ ?>

                              <option value=<?= $club["id_club"] ?>><?= $club["nom_club"] ?></option>

                            <?php } ?>
                          </select>
                        </div>

                        <div class="input-group mb-3" style="border-radius: 50px !important;">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-calendar"></i> </span>
                          </div>
                          <input type="number" required name="but2" id="passwrd" min="0" class="form-control" placeholder="Nombre de buts" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <button type="submit" id="bouton" class="form-control">Ajouter la rencontre</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="../public/js/js4.js"></script>
</body>

</html>