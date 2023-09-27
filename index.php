<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AmsetHR</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
</head>

<body>
    <main>
        <div id="title">AmsetHR</div>
        <menu id="searchbar">
            <div id="site">
                <?php include("connexion.php");
                $competences = "SELECT nomCompetence FROM fiche_salarie.competences";
                $result = $conn->query($competences);
                echo '<a>', $result, '</a>';
                foreach ($result as &$value) { ?>
                    <a class="searchbar_option">
                        <?php $value ?>
                    </a>
                <?php }
                ?>
                <!--
                Développement projet
                Administration système et réseau
                Conception d'applications
                Intégration d'applications
                Développement Web
            </div><br />
            <div id="competence">
                Paris
                Madrid
                Montréal
                Casablanca -->
            </div>
        </menu>
    </main>
    <script src="index.js"></script>
</body>

</html>