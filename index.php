<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=fiche_salarie;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

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
                <? echo '<a class="searchbar_option">', $site, '</a>' ?>
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