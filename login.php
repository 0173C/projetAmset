<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div id="container">
        <form action="verification.php" method="POST">
            <h1>Login</h1>

            <label><b>Nom de l'utilisateur</b></label>
            <input type="text" placeholder="Nom" name="username" required>


            <input type="submit" id='submit' value='Se connecter'>

            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2) {
                    echo "<p style='color:red'>Utilisateur ou Mot de passe incorrect</p>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
