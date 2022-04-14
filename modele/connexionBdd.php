<?php
$dbh = 'mysql:host=localhost;dbname=ligue1';
$user = 'root';
$pass ='';

try {
    $pdo = new PDO ($dbh, $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage();
    die();
    }

?>