<?php
// Démarrer la session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté avant de le déconnecter
if (isset($_SESSION['privilege'])) {
    // Supprimer toutes les données de session
    $_SESSION = array();

    // Détruire la session
    session_destroy();

    // Supprimer le cookie de session s'il est utilisé
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}

// Rediriger vers la page de connexion
header("Location: login.php");
exit();
?>
