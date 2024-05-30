<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $db_username = 'root';
    $db_password = 'N-Word';
    $db_name = 'fiche_salarie';
    $db_host = 'localhost';

    // Connexion à la base de données
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    // Échappement des entrées utilisateur
    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

    if ($username !== "" && $password !== "") {
        // Vérification des identifiants
        $query = "SELECT count(*) FROM utilisateur WHERE nom_utilisateur = '$username' AND mot_de_passe = '$password'";
        $result = mysqli_query($db, $query);
        $count = mysqli_fetch_array($result)['count(*)'];

        if ($count != 0) {
            // L'utilisateur est authentifié
            $_SESSION['username'] = $username;
            $_SESSION['privilege'] = "visitor";
            header('Location: trombinoscope.php');
            exit();
        } else {
            // Identifiants invalides
            header('Location: login.php?erreur=1');
            exit();
        }
    } else {
        // Nom d'utilisateur ou mot de passe vide
        header('Location: login.php?erreur=2');
        exit();
    }
} else {
    // Redirection si les paramètres POST ne sont pas définis
    header('Location: login.php');
    exit();
}

mysqli_close($db);
?>
