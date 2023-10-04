<?php
include("connexion.php");
$salarie = "SELECT nomSalarie FROM fiche_salarie.salarie";
$salarie = "SELECT prenomSalarie FROM fiche_salarie.salarie";
$salarie = "SELECT civilite FROM fiche_salarie.salarie";
$salarie = "SELECT email FROM fiche_salarie.salarie";
$salarie = "SELECT telephonne FROM fiche_salarie.salarie";
$salarie = "SELECT adresse FROM fiche_salarie.salarie";
$salarie = "SELECT codePostal FROM fiche_salarie.salarie";
$salarie = "SELECT ville FROM fiche_salarie.salarie";
$salarie = "SELECT site FROM fiche_salarie.salarie";
$salarie = "SELECT competences FROM fiche_salarie.salarie";
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