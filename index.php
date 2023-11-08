<?php

//  --  Code à inclure dans chaque page nécessitant d'être connecté --
//          ->      include("index.php");

if (!isset($_SESSION)) {
    session_start();
}

var_dump($_SESSION['privilege']);

if (!isset($_SESSION['privilege'])) {
    /*
    -- A remettre quand login.php sera présent --
//  echo '<div class="button"><input type="checkbox" class="searchbar_option_competence" id="' . $row['nomCompetence'] . '" name="' . $row['nomCompetence'] . '"><label for="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '</label></div>';
                }
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
//  echo '<div class="button"><input type="checkbox" class="searchbar_option_sites" id="' . $row['nomSite'] . '"><label for="' . $row['nomSite'] . '">' . $row['nomSite'] . '</label></div>';
?>
