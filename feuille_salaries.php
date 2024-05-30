<?php
include("index.php");
echo '<link rel="stylesheet" href="./cv.css">';
header('Content-Type: text/html; charset=utf-8');
include("connexion.php");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id === null) {
    die("Erreur : ID non spécifié.");
}

// Utiliser une requête préparée pour éviter les injections SQL
$salarie_stmt = $conn->prepare("
    SELECT s.nomSalarie, s.prenomSalarie, s.site, s.competences, st.nomSite 
    FROM fiche_salarie.salarie s
    LEFT JOIN fiche_salarie.sites st ON s.site = st.idSite 
    WHERE s.idSalarie = ?
");

$salarie_stmt->bind_param("i", $id);
$salarie_stmt->execute();
$result = $salarie_stmt->get_result();

// Début du contenu HTML
echo '<button id="disconnect">Se déconnecter</button>';
echo '<div id="content">';

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div id="nomSalarie">' . htmlspecialchars($row['nomSalarie'], ENT_QUOTES, 'UTF-8') . '</div>';
        echo '<div id="prenomSalarie">' . htmlspecialchars($row['prenomSalarie'], ENT_QUOTES, 'UTF-8') . '</div>';
        echo '<div id="nomSite">' . htmlspecialchars($row['nomSite'], ENT_QUOTES, 'UTF-8') . '</div>';
        echo '<div id="competences">' . htmlspecialchars($row['competences'], ENT_QUOTES, 'UTF-8') . '</div>';
    }
} else {
    echo "Aucun résultat trouvé.";
}

echo '</div>'; // Fin du contenu HTML

$salarie_stmt->close();
$conn->close();
?>
