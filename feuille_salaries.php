<?php
header('content-type: text/html; charset=utf-8');
include("connexion.php"); // connexion BDD 
include("index.php");
include("connexion.php");

$salarie = "SELECT * FROM fiche_salarie.salarie WHERE idSalarie = 1 ";
$result = $conn->query($salarie);

echo "<button id='disconnect'>Se déconnecter</button>";

while ($row = mysqli_fetch_array($result))
    foreach ($result as $row => $salarie) {
        echo $row['idSalarie'] . '' . $row['nomSalarie'] . '' . $row['prenomSalarie'] . '' . $row['civilite'] . '' . $row['email'] . '' . $row['telephonne'] . '' . $row['adresse'] . '' . $row['codePostal'] . '' . $row['ville'] . '' . $row['site'] . '' . $row['competences'] . '<br>';
    }
?>