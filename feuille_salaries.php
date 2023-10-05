<?php
include("connexion.php");
$salarie = "SELECT * FROM fiche_salarie.salarie";
$result = $conn->query($salarie);
$competences = "SELECT nomCompetence FROM fiche_salarie.competences";
$result = $conn->query($competences);

while ($row = mysqli_fetch_array($result)) {
    echo '<a class="searchbar_option">', $row['nomCompetence'], '</a>';
    echo '<a class="searchbar_option">', $row['nomSalarie'], '</a>';
    echo '<a class="searchbar_option">', $row['prenomSalarie'], '</a>';
    echo '<a class="searchbar_option">', $row['civilite'], '</a>';
    echo '<a class="searchbar_option">', $row['email'], '</a>';
    echo '<a class="searchbar_option">', $row['telephonne'], '</a>';
    echo '<a class="searchbar_option">', $row['adresse'], '</a>';
    echo '<a class="searchbar_option">', $row['codePostal'], '</a>';
    echo '<a class="searchbar_option">', $row['ville'], '</a>';
    echo '<a class="searchbar_option">', $row['site'], '</a>';
}
?>