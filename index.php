<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                header('content-type: text/html; charset=utf-8');
                include("connexion.php");
                $competences = "SELECT nomCompetence FROM fiche_salarie.competences";
                $result = $conn->query($competences);

                echo '<div id="menu_competence">'; // -- Menu choix compétences
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="button"><input type="checkbox" class="searchbar_option_competence" id="' . $row['nomCompetence'] . '" name="' . $row['nomCompetence'] . '"><label for="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '</label></div>';
                }

                echo '</div></br>
                <div id="menu_site">'; // -- Menu choix site
                
                $sites = "SELECT nomSite FROM fiche_salarie.sites";
                $result = $conn->query($sites);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="button"><input type="checkbox" class="searchbar_option_sites" id="' . $row['nomSite'] . '"><label for="' . $row['nomSite'] . '">' . $row['nomSite'] . '</label></div>';
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
