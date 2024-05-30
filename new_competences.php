<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Compétence</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="container">
        <form action="save_competence.php" method="POST">
            <h1>Nouvelle Compétence</h1>
            <label><b>Nom de la compétence</b></label>
            <input type="text" placeholder="Nom de la compétence" name="competence" required>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>

</html>
