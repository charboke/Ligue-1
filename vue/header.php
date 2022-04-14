<style>
  #cherche{
    color : rgb(58, 175, 159);
    border-color: rgb(58, 175, 159);
    
  }
</style>
<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a href="../vue/accueilTD.php"><img style="margin-left: 20px;" src="../public/images/logo.png" width="40" height="50" class="d-inline-block align-top" alt=""></a>
    <a style="padding-left: 20px;" class="navbar-brand" href="../vue/accueilTD.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Liste" aria-controls="Liste" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="Liste">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../vue/ajout_club.php">Ajouter un club</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../vue/modification_club.php">Modifier un club</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../vue/ajout_rencontre.php">Ajouter une rencontre</a>
        </li>
        <form method="POST" action="accueilTD.php" enctype="multipart/form-data">
          <input type="search" name = "search" id ="search" placeholder="Rechercher un club" aria-label="Search">
          <button id="cherche" class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
        <li class="nav-item">
          <a class="nav-link" href="../vue/infoUser.php" >Mon Compte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">Deconnexion</a>
        </li>
      </ul>

    </div>
  </nav>
</header>
