<?php
include("index.php");
echo '<link rel="stylesheet" href="./cv.css">';
header('content-type: text/html; charset=utf-8');
include("connexion.php"); // connexion BDD 

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Erreur";
}

$salarie = "SELECT * FROM fiche_salarie.salarie WHERE idSalarie = $id ";
$result = $conn->query($salarie);

echo "<button id='disconnect'>Se déconnecter</button>";

$previousValue = null;

echo '<body><div id=content>';
while ($row = $result->fetch_array()) {
    foreach ($row as $key => $value) {
        if ($value !== $previousValue) {
            echo '<div id="' . $key . '">' . $value . '</div>';
            $previousValue = $value;
        }
    }
}
echo '</div></body>';
?>