<?php
session_start();

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['username'])) {
    header('Location: trombinoscope.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $db_username = 'root';
    $db_password = '';
    $db_name = 'fiche_salarie';
    $db_host = 'localhost';

    // Connexion à la base de données
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to database');

    // Échappement des entrées utilisateur
    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

    if ($username !== "" && $password !== "") {
        // Vérification des identifiants
        $query = "SELECT count(*) FROM salarie WHERE nomSalarie = '$username'";
        $result = mysqli_query($db, $query);
        if (!$result) {
            die('Erreur MySQL : ' . mysqli_error($db));
        }
        $count = mysqli_fetch_array($result)[0];

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
