<?php
include("index.php");
echo '<link rel="stylesheet" href="./cv.css">';
header('content-type: text/html; charset=utf-8');
include("connexion.php"); 

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Erreur";
}

$salarie = "SELECT s.nomSalarie, s.prenomSalarie, s.site, s.competences, st.nomSite 
            FROM fiche_salarie.salarie s
            LEFT JOIN fiche_salarie.sites st ON s.site = st.idSite";

$result = $conn->query($salarie);

echo "<button id='disconnect'>Se déconnecter</button>";

echo '<body><div id="content">'; 

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        echo '<div id="nomSalarie">' . $row['nomSalarie'] . '</div>';
        echo '<div id="prenomSalarie">' . $row['prenomSalarie'] . '</div>';
        echo '<div id="nomSite">' . $row['nomSite'] . '</div>';
        echo '<div id="competences">' . $row['competences'] . '</div>';
    }
} else {
    echo "Aucun résultat trouvé.";
}

echo '</div></body>'; 
?>
