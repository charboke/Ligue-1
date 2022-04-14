<!--Protéction de la page en PHP-->
<?php session_start();
if (!isset($_SESSION['emailUser'])) {
  header('Location:TD Ligue 1.php');
}
/*J'appelle ma Base de données*/
require '../modele/connexionBdd.php';
/*J'appelle  ma page fonction*/
require '../modele/fonction.php';
/* J'appelle les éléments de ma base via la fonction recup club de la page fonction*/
$details =  recupClubById($pdo, $_GET['id']);

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
  <link rel="stylesheet" type="text/css" href="../public/css/modif_club.css">
</head>

<body>

  <?php include 'header.php' ?>

  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="titre" id="titre" style="text-align: center;">Modifier un club</div>
        </div>
      </div>
      <?php if (isset($_GET["modifKO"])) { ?><p class="alert alert-danger">Le club existe déjà ! </p><?php } ?>
      <?php if (isset($_GET["modifOK"])) { ?><p class="alert alert-success">Le club a bien été ajouté</p><?php } ?>

      <div class=" row " style="vertical-align: middle;">
        <div class="card formulaire">
          <div class="card-body corpsFormulaire">
            <div class="card-text">

              <form action="../controller/traitement_modifClub.php" method="POST" enctype="multipart/form-data">

                <div class="input-group mb-3" style="border-radius: 50px !important;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-futbol"></i> </span>
                  </div>
                  <input type="text" required name="nom_club" id="passwrd" class="form-control" value="<?php echo $details['nom_club'] ?>" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                </div>
                <input type='hidden' name='id' value='<?= $_GET['id'] ?>'>

                <div class="input-group mb-3" style="border-radius: 50px !important;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-check"></i> </span>
                  </div>
                  <input type="text" required name="modif_club" id="passwrd" class="form-control" placeholder="Modification du Nom du Club" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                </div>

                <div class="input-group mb-3" style="border-radius: 50px !important;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="border-radius: 50px !important;" id="basic-addon1"><i class="fas fa-city"></i> </span>
                  </div>
                  <input type="text" required  name="ville_club" id="passwrd" class="form-control" placeholder="Modification de la Ville du Club" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 50px !important;">
                </div>

                <div class="input-group" style="border-radius: 50px !important;">
                  <div class="input-group-prepend" style="border-radius: 50px !important;">
                    <span class="input-group-text" name ="logo_club" id="inputGroupFileAddon01"><i class="fas fa-upload"></i></span>
                  </div>
                  <div class="custom-file" style="border-radius: 50px !important;">
                    <input type="file" onclick="validation()" name ="logo_club" class="custom-file-input"  placeholder="Modification du Logo du Club" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" style="border-radius: 50px !important;">
                  </div>
                </div>
                <br>


                <button type="submit" name="envoyer" id="bouton" class="form-control">Modifier les informations du club</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="../public/js/ajoutClub.js"></script>



</body>

</html>