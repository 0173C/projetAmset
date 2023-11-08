<?php
header('content-type: text/html; charset=utf-8');
include("connexion.php");
$retour = 'SELECT * FROM fiche_salarie.salarie';
$result = $conn->query($retour);
echo 'test';
?>