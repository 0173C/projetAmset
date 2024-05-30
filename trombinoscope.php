<?php
session_start();
if (!isset($_SESSION['privilege'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AmsetHR</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <script src="script.js"></script>
</head>

<body>
    <main>
        <!-- SE DECONNECTER -->
        <div id="head"><button id="logout" onClick=logout()>Se déconnecter</button></div>
        <div id="site">
            <menu id="searchbar">
                <?php
                include ("connexion.php");
                $competences = "SELECT nomCompetence FROM fiche_salarie.competences";
                $result = $conn->query($competences);

                echo '<div id="menu_competence">';
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="button" onclick="toggleCheckbox(\'' . $row['nomCompetence'] . '\')"><input type="checkbox" class="searchbar_option_competence" id="' . $row['nomCompetence'] . '" name="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '</input></div>';
                }

                echo '</div></br>
                <div id="menu_site">'; // RETIRER LE </br> si CSS
                
                // Affichage des cases des sites
                $sites = "SELECT nomSite FROM fiche_salarie.sites";
                $result = $conn->query($sites);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="button" onclick="toggleCheckbox(\'' . $row['nomSite'] . '\')"><input type="checkbox" class="searchbar_option_sites" id="' . $row['nomSite'] . '">' . $row['nomSite'] . '</input></div>';
                }

                echo '</div></br> <button type="button" id="recherche" onclick="rechercher()">Rechercher</button></menu>'; // RETIRER LE </br> si CSS
                ?>
            </menu>

            <div id='retour'>Résultats :
                <?php
                $content = trim(file_get_contents("php://input"));
                $data = json_decode($content, true);
                $data['success'] = true;
                echo json_encode($data);
                
                var_dump($data);

                /*                 <!-- Affichage des résultats -->             */

                include ("connexion.php");
                $arraySites = ['Paris', 'Madrid', 'Montréal', 'Casablanca'];
                $arrayComp = ['devWeb', 'integrationAppli', 'conceptionAppli', 'adminSIR', 'devObj'];
                $default_sql_request = "SELECT * FROM fiche_salarie.salarie";
                $sql_join = "INNER JOIN sites ON sql_salarie.site=sites.idSite INNER JOIN competences ON sql_salarie.competences=competences.idCompetence";

                if (!isset($_POST['retourTab']) or count($_POST['retourTab']) == 0) {
                    $sql_salarie = $default_sql_request;
                } else {
                    $sql_salarie = $default_sql_request . $sql_join . " WHERE ";
                    foreach ($_POST['retourTab'] as $v) {
                        if (in_array($v, $arraySites)) {
                            $sql_salarie += 'sites=\'' . $v . '\' ';
                        } else if (in_array($v, $arrayComp)) {
                            $sql_salarie += 'competences=\'' . $v . '\' ';
                        }
                        if ($v != $_POST['retourTab'][count($_POST['retourTab']) - 1]) {
                            $sql_salarie += ' OR ';
                        }
                    }
                }

                //TEST----
                $test1 = !isset($_POST['retourTab']);
                $test2 = count($_POST['retourTab']);
                echo $_POST['retourTab'] . "</br>" . $test1 . "</br>" . $test2 . "</br>";
                var_dump($_POST['retourTab']);
                var_dump($_POST);
                echo ($sql_salarie);
                // -----
                
                $result = $conn->query($sql_salarie);
                if ($result && $result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $id_salarie = $row['idSalarie'];
                        $nom = $row['nomSalarie'];
                        $prenom = $row['prenomSalarie'];
                        $site = $row['site'];
                        echo "<div id='salarie_$id_salarie' onclick='redirectFicheSalarie($id_salarie)' class='result'>";
                        echo "<p>Nom : $nom</p>";
                        echo "<p>Prénom : $prenom</p>";
                        echo "<p>Site : $site</p>";
                        echo "</div>";
                    }
                } else {
                    echo "Aucun résultat trouvé.";
                }

                /*                            ------                            */

                ?>
            </div>
        </div>
    </main>
</body>

</html>