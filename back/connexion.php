<?php
session_start();
include("fonction.php");

// Vérification de l'existence de données POST
$msgErrors = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérification de l'email
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        $msgErrors += "L'email est requis.<br>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $msgErrors += "L'email n'est pas valide.<br>";
    }

    // Vérification du mot de passe
    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        $msgErrors .= "Le mot de passe est requis.<br>";
    }

    if (strlen($msgErrors) == 0) {
        $user = checkIfUserExist($_POST["email"]);
        if ($user && password_verify($_POST["password"], $user['password'])) {
            $_SESSION['user'] = $user; // Créer une session pour l'utilisateur
            header('Location: ../index.php?msg=login_success'); // REDIRECTION
            exit();
        }
        $_SESSION['login_error'] = "email ou mot de passe incorrect";
        header('Location: ../page/connexion.php?msg=login_error');
        exit();
    } else {
        // Stocker les erreurs dans la session
        $_SESSION['login_error'] = "email ou mot de passe incorrect";
        header('Location: ../page/connexion.php?msg=login_error');
        exit();
    }
}