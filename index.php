<?php

//  --  Code à inclure dans chaque page nécessitant d'être connecté --
//          ->      include("index.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['privilege'])) {
    $_SESSION['privilege'] = 'visitor';
    header("Location: login.php");
} else {
    if(isset($_SESSION['username'])){
        header('Location: trombinoscope.php');
    } else {
        header('Location: login.php');
    }
}

?>
