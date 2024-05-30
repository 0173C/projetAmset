<?php
// Code à inclure dans chaque page nécessitant d'être connecté
// -> include("index.php");

if (!isset($_SESSION)) {
    session_start();
}

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['privilege'])) {
    $_SESSION['privilege'] = 'visitor';
    header("Location: login.php");
    exit(); // Assurez-vous de quitter après la redirection
} else {
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit(); // Assurez-vous de quitter après la redirection
    }
}

// Pour une sécurité accrue, vous pouvez regénérer l'ID de session après la connexion
if (isset($_SESSION['regenerate']) && $_SESSION['regenerate'] === true) {
    session_regenerate_id(true); // Regénère l'ID de session et supprime l'ancien
    unset($_SESSION['regenerate']); // Supprime la clé de session pour éviter une regénération continue
}
?>
