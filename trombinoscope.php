<?php
session_start();
if (!isset($_SESSION['privilege'])) {
    include("login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AmsetHR</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <script src="script.js"></script>
    <script>
        function fetchSalarieData() {
            fetch('') 
                .then(response => response.json())
                .then(data => {
                    let retourDiv = document.getElementById('retour');
                    data.forEach(salarie => {
                        retourDiv.innerHTML += `<div>
                            <p>Nom: ${salarie.nomSalarie}</p>
                            <p>Prénom: ${salarie.prenomSalarie}</p>
                            <p>Civilite: ${salarie.civilite}</p>
                            <p>Email: ${salarie.email}</p>
                            <!-- Ajoutez d'autres données que vous souhaitez afficher -->
                        </div>`;
                    });
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function () {
            fetchSalarieData();
        });
    </script>
</head>

<body>
    <main>
        <div id="head"><button id="logout" onClick= logout()>Se déconnecter</button></div>
        <menu id="searchbar">
            <div id="site">
                <menu id="searchbar">
                    <?php
                    include("connexion.php");
                    $competences = "SELECT nomCompetence FROM fiche_salarie.competences";
                    $result = $conn->query($competences);

                    echo '<div id="menu_competence">'; 
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="button"><input type="checkbox" class="searchbar_option_competence" id="' . $row['nomCompetence'] . '" name="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '</input></div>';
                    }

                    echo '</div></br>
                <div id="menu_site">'; 

                    $sites = "SELECT nomSite FROM fiche_salarie.sites";
                    $result = $conn->query($sites);

                    while ($row = mysqli_fetch_array($result)) {
                        echo '<div class="button"><input type="checkbox" class="searchbar_option_sites" id="' . $row['nomSite'] . '">' . $row['nomSite'] . '</input></div>';
                    }

                    echo '</div></br> <button type="button" id="recherche" onclick="rechercher()">Rechercher</button></menu>';
                    echo $_SESSION['privilege'];

                    ?>

                    <div id='retour'>Résultats : </div>

                    
                </div>
        </menu>
    </main>
</body>

</html>
