
<html>
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
//  --  Code à inclure dans chaque page nécessitant d'être connecté --
//          ->      include("index.php");

if (!isset($_SESSION)) {
    session_start();
}

var_dump($_SESSION['privilege']);

if (!isset($_SESSION['privilege'])) {
    /*
    -- A remettre quand login.php sera présent --

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
    $_SESSION['privilege'] = 'visitor';
    header("Location: login.php");
    */
    $_SESSION['privilege'] = 'connected'; // A supprimer
    header("Location: trombinoscope.php"); // A supprimer
} else {
    // -- A supprimer
    $_SESSION['privilege'] = 'connected';
    //--
}
header("Location: trombinoscope.php"); // A supprimer

?>