<!-- Fonction page Accueil -->
<?php
function recupClubs($pdo, $recherche)
{
    $requete = 'SELECT *, SUM(mj)as MJ, SUM(mg)as MG, SUM(mn)as MN, SUM(mp)as MP, SUM(bp)as BP,SUM(bc)as BC,SUM(points)as PTS FROM club
    /*LEFT*/JOIN stat ON club.id_club = stat.id_club WHERE 1=1 ';
    
    if (!empty($recherche)) {
        $requete .= ' AND club.nom_club LIKE "%' . $recherche . '%" ';
        $requete .= ' AND club.ville_club LIKE "%' . $recherche . '%" ';
    }


    $requete .= ' GROUP by nom_club  ORDER  by PTS DESC';

    $stnt = $pdo->prepare($requete);

    $stnt->execute();
    $clubs = $stnt->fetchAll();



    return $clubs;
    /*echo '<pre>';
    var_dump($clubs);
    echo '<pre>';*/
}

/*Fonction controle club doublon*/

function doublon($pdo, $nom_club_ajout)
{

    $req = 'SELECT nom_club FROM club WHERE nom_club = :club';
    $stnt = $pdo->prepare($req);
    $stnt->execute([':club' => $nom_club_ajout]);
    $clubs = $stnt->fetch();

    return $clubs;
}


/*Fonction page Accueil*/

function recupListeClubs($pdo)
{
    $requete = 'SELECT * FROM club';
    $stnt = $pdo->prepare($requete);
    $stnt->execute();
    $liste = $stnt->fetchAll();

    return $liste;
}

/*Fonction page Accueil*/

function recupClubById($pdo, $id_club)
{
    $requete = 'SELECT nom_club FROM club
    where id_club = :idClub';
    $stnt = $pdo->prepare($requete);
    $stnt->execute([':idClub' => $id_club]);
    $liste = $stnt->fetch();

    return $liste;
}

/* Fonction page détails */


function recupDetails($pdo, $idclub)
{
    $requete = 'SELECT *, SUM(mj)as MJ, SUM(mg)as MG, SUM(mn)as MN, SUM(mp)as MP, SUM(bp)as BP,SUM(bc)as BC,SUM(points)as PTS FROM club
    LEFT JOIN stat ON club.id_club = stat.id_club
    WHERE club.id_club =:idClub
    GROUP by nom_club ';
    $stnt = $pdo->prepare($requete);
    $stnt->execute([':idClub' => $idclub]);
    $details = $stnt->fetch();

    return $details;
}

/* Fonction page connexion */

function connexion($pdo, $mail)
{
    $requete = 'SELECT * FROM user WHERE email = "' . $mail . '" ';
    $stnt = $pdo->prepare($requete);
    $stnt->execute();
    $users = $stnt->fetch();

    return $users;
}

/* Fonction user */

function user($pdo)
{
    $requete = 'SELECT picture FROM user WHERE nom_user ="' . $_SESSION['nom_user'] . '" ';
    $stnt = $pdo->prepare($requete);
    $stnt->execute();
    $user = $stnt->fetch();

    return $user;
}



/*Fonction controle club doublon*/

function doublonUsers($pdo, $mail)
{
    $req = 'SELECT email FROM user
WHERE user.email = :mail';
    $stnt = $pdo->prepare($req);
    $stnt->execute([':mail' => $mail]);
    $user = $stnt->fetch();

    return $user;
}

/* Fonction pour faire un UPLOAD*/


/*Fonction inscription*/

function inscription($pdo, $name, $forname, $mail, $password3, $picture)
{

    $uploaddir = '../../upload/';
    $uploadfile = $uploaddir . basename($_FILES['picture']['name']);

    if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
        header("Location:../vue/TD Ligue 1.php?userOK");
    } else {
        header("Location:../vue/TD Ligue 1.php?userKO");
    }

    $inscription = $pdo->prepare(
        "INSERT INTO user (nom_user, prenom_user, email, mdp, picture)
                     values(:nom_user, :prenom_user, :email, :mdp, :picture)",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
    );

    $inscription->execute(array(
        ':nom_user' => $name,
        ':prenom_user' => $forname,
        ':email' => $mail,
        ':mdp' => $password3,
        ':picture' => $_FILES['picture']['name'],
    ));
    $inscription->closeCursor();
}

/*Fonction page traitementAjout_club*/

function ajoutClub($pdo, $nom_club_ajout, $nom_ville_ajout, $logo)
{
    $uploaddir = '../../upload/';
    $uploadfile = $uploaddir . basename($_FILES['logo_club']['name']);

    if (move_uploaded_file($_FILES['logo_club']['tmp_name'], $uploadfile)) {
        header("Location:../vue/ajout_club.php?clubOK");
    } else {
        header("Location:../vue/ajout_club.php?clubKO");
    }

    $reqAjoutClub = $pdo->prepare(
        "INSERT INTO club (nom_club, ville_club, logo)
                     values(:nom_club, :ville_club, :logo)",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)
    );

    $reqAjoutClub->execute(array(
        ':nom_club' => $nom_club_ajout,
        ':ville_club' => $nom_ville_ajout,
        ':logo' => $_FILES['logo_club']['name'],
    ));
    $reqAjoutClub->closeCursor();
}


/*Fonction page traitementAjout_rencontre*/

function ajoutGagnant($pdo, $mg, $mn, $mp, $bp, $bc, $db, $pts, $id_club)
{
    /*echo  "INSERT INTO stat(mj, mg, mn, mp, bp, bc, dp, points, id_club)
    values(1, $mg, $mn, $mp, $bp, $bc, $db, $pts, $id_club)";
    die();*/
    $reqAjoutRencontre = $pdo->prepare(
        "INSERT INTO stat(mj, mg, mn, mp, bp, bc, dp, points, id_club)
                     values(1, :mg, :mn, :mp, :bp, :bc, :db, :pts, :id_club)",
        [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]
    );

    $reqAjoutRencontre->execute(array(

        ':mg' => $mg,
        ':mn' => $mn,
        ':mp' => $mp,
        ':bp' => $bp,
        ':bc' => $bc,
        ':db' => $db,
        ':pts' => $pts,
        ':id_club' => $id_club
    ));

    $reqAjoutRencontre->closeCursor();
}


/* Fonction pour faire un UPDATE*/
function updateClub($pdo, $id, $nom, $ville, $logo)
{


    $uploaddir = '../../upload/';
    $uploadfile = $uploaddir . basename($_FILES['logo_club']['name']);

    move_uploaded_file($_FILES['logo_club']['tmp_name'], $uploadfile);



    $req = $pdo->prepare("UPDATE club SET nom_club = :nom, ville_club = :ville, logo = :logo WHERE id_club = :id");

    $req->execute(array(        
        ':id' => $id,
        ':nom' => $nom,
        ':ville' => $ville,
        ':logo' => $_FILES['logo_club']['name']
    ));

    $req->closeCursor();
}


/* Fonction pour faire un DELETE*/

function deleteStat($pdo, $id)
{
    $req = $pdo->prepare("DELETE FROM stat WHERE id_club = :id ");

    $req->execute(array(
        ':id' => $id,
    ));

    $req->closeCursor();
}

function deleteClub($pdo, $id)
{
    $req = $pdo->prepare("DELETE FROM club  WHERE id_club = :id ");

    $req->execute(array(
        ':id' => $id,
    ));

    $req->closeCursor();
}
