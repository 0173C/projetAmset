<?php
include("connexion.php");

if (isset($_POST['competence'])) {
    $competence = $_POST['competence'];

    // Requête pour insérer la nouvelle compétence dans la base de données
    $sql = "INSERT INTO competences (nomCompetence) VALUES ('$competence')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvelle compétence ajoutée avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
