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
                <!-- Lien vers la page de création des compétences -->
                <a href="new_competences.php">Créer une nouvelle compétence</a>
                <!-- Fin du lien -->

                <?php
                include("connexion.php");

                // Récupération des compétences disponibles
                $competences_query = "SELECT nomCompetence FROM competences";
                $competences_result = $conn->query($competences_query);

                echo '<div id="competences">';
                echo '<h2>Compétences</h2>';
                echo '<form action="trombinoscope.php" method="POST">';
                if ($competences_result->num_rows > 0) {
                    while ($row = $competences_result->fetch_assoc()) {
                        echo '<input type="checkbox" name="competences[]" value="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '<br>';
                    }
                }
                echo '<input type="submit" value="Rechercher">';
                echo '</form>';
                echo '</div>';
                ?>
            </menu>

            <div id='retour'>Résultats :
                <?php
                // Construction de la requête SQL pour récupérer les salariés
                $sql_salarie = "SELECT * FROM salarie";

                // Vérification si des compétences sont sélectionnées dans le formulaire
                if (isset($_POST['competences'])) {
                    // Construction de la clause WHERE pour la recherche par compétences
                    $competences = $_POST['competences'];
                    $where_clause = " WHERE ";
                    foreach ($competences as $competence) {
                        $where_clause .= "competences LIKE '%$competence%' OR ";
                    }
                    $where_clause = rtrim($where_clause, " OR ");

                    // Ajout de la clause WHERE à la requête SQL existante
                    $sql_salarie .= $where_clause;
                }

                // Exécution de la requête SQL
                $result = $conn->query($sql_salarie);

                // Affichage des résultats
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
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
                ?>
            </div>
        </div>
    </main>
</body>

</html>
