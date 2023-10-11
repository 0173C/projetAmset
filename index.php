<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AmsetHR</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <script src="script.js"></script>
</head>

<body>
    <main>
        <div id="title">AmsetHR</div>
        <menu id="searchbar">
            <div id="site">
                <?php
                include("connexion.php");
                $competences = "SELECT nomCompetence FROM fiche_salarie.competences";
                $result = $conn->query($competences);

                echo '<div id="menu_competence">'; // -- Menu choix compétences
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="button"><input type="checkbox" class="searchbar_option_competence" id="' . $row['nomCompetence'] . '" name="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '</input></div>';
                }

                echo '</div></br>
                <div id="menu_site">'; // -- Menu choix site
                
                $sites = "SELECT nomSite FROM fiche_salarie.sites";
                $result = $conn->query($sites);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="button"><input type="checkbox" class="searchbar_option_sites" id="' . $row['nomSite'] . '">' . $row['nomSite'] . '</input></div>';
                }

                echo '</div></br> <button type="button" id="recherche" onclick="rechercher()">Rechercher</button>';

                // -- Affichage des résultats
                
                ?>

                <div id='retour'>Résultats : </div>

            </div>
        </menu>
    </main>
</body>

</html>