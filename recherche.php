<?php
include("connexion.php");

if (isset($_GET['term'])) {
    // Récupérer le terme de recherche depuis l'URL
    $search_term = $_GET['term'];

    // Préparer la requête SQL avec une clause WHERE pour rechercher par nom ou prénom
    $query = "SELECT * FROM salarie WHERE nomSalarie LIKE ? OR prenomSalarie LIKE ?";

    // Préparer la requête avec PDO pour sécuriser les paramètres
    $stmt = $conn->prepare($query);

    // Ajouter le terme de recherche aux paramètres de la requête avec le caractère de joker '%'
    $search_term = "%" . $search_term . "%";
    $stmt->bind_param("ss", $search_term, $search_term);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats de la requête
    $result = $stmt->get_result();

    // Afficher les résultats
    while ($row = $result->fetch_assoc()) {
        echo "<p>Nom: " . $row['nomSalarie'] . ", Prénom: " . $row['prenomSalarie'] . "</p>";
    }
} else {
    // Si aucun terme de recherche n'est spécifié, afficher un message d'erreur
    echo "Aucun terme de recherche spécifié.";
}
?>
