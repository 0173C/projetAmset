<?php
include("connexion.php");
$retour = 'SELECT * FROM fiche_salarie.salarie';
$result = $conn->query($retour);
echo 'test';
?>