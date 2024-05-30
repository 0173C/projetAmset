<?php
// Inclure le fichier de connexion à la base de données
include("connexion.php");

// Requête SQL pour mettre à jour les compétences
$update_query = "UPDATE salarie SET competences = REPLACE(competences, '0', '1'),
                                      competences = REPLACE(competences, '1', '2'),
                                      competences = REPLACE(competences, '10', '3'),
                                      competences = REPLACE(competences, '11', '4'),
                                      competences = REPLACE(competences, '100', '5')";

// Exécution de la requête
if ($conn->query($update_query) === TRUE) {
    echo "Mise à jour effectuée avec succès.";
} else {
    echo "Erreur lors de la mise à jour : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
