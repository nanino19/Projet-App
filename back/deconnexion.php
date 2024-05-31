<?php
session_start(); 

if (isset($_POST['logout'])) {
    session_unset();  // Supprime toutes les variables de session
    session_destroy(); // Détruit la session

    header('Location: ../index.php'); // Ajustez selon le chemin approprié
    exit; // Assurez-vous que le script s'arrête après la redirection
}
?>