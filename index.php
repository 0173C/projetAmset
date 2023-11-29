<?php
//  --  Code à inclure dans chaque page nécessitant d'être connecté --
//          ->      include("index.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['privilege'])) {
    /*
    -- A remettre quand login.php sera présent --

//  echo '<div class="button"><input type="checkbox" class="searchbar_option_competence" id="' . $row['nomCompetence'] . '" name="' . $row['nomCompetence'] . '"><label for="' . $row['nomCompetence'] . '">' . $row['nomCompetence'] . '</label></div>';
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
    //header("Location: trombinoscope.php"); // A supprimer
} else {
    // -- A supprimer
    $_SESSION['privilege'] = 'connected';
    //--
}
header("Location: trombinoscope.php"); // A supprimer

?>
