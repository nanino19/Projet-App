<?php
session_start(); // Assurez-vous que cette ligne est au début du fichier, avant tout envoi de contenu

include("fonction.php");

// Vérification de l'existence de données POST
$msgErrors = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'email
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        $msgErrors .= "L'email est requis.<br>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $msgErrors .= "L'email n'est pas valide.<br>";
    }

    // Vérification du mot de passe
    if (!isset($_POST["pwd1"]) || !isset($_POST["pwd2"]) || empty($_POST["pwd1"]) || empty($_POST["pwd2"])) {
        $msgErrors .= "Les deux champs de mot de passe sont requis.<br>";
    } elseif ($_POST["pwd1"] !== $_POST["pwd2"]) {
        $msgErrors .= "Les mots de passe ne correspondent pas.<br>";
    }

    // Vérification du nom et prénom
    if (!isset($_POST["nom"]) || !isset($_POST["prenom"]) || empty($_POST["nom"]) || empty($_POST["prenom"])) {
        $msgErrors .= "Le nom et le prénom sont requis.<br>";
    }

    // Vérification du numéro de téléphone
    if (!isset($_POST["tel"]) || empty($_POST["tel"])) {
        $msgErrors .= "Le numéro de téléphone est requis.<br>";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["tel"])) {
        $msgErrors .= "Le numéro de téléphone n'est pas valide.<br>";
    }

    if (strlen($msgErrors) == 0) {
        if (insererUtilisateur($_POST["email"], $_POST["pwd1"], $_POST["nom"], $_POST["prenom"], $_POST["tel"])) {
            header('Location: ../page/moncompte.php?msg=subscribe_success'); // REDIRECTION
            exit();
        }
        $_SESSION['errors_subscribe'] = "L'adresse e-mail est déjà utilisée.";
        header('Location: ../page/moncompte.php?msg=subscribe_error');
        exit();
    } else {
        // Stocker les erreurs dans la session
        $_SESSION['errors_subscribe'] = $msgErrors;
        header('Location: ../page/moncompte.php?msg=subscribe_error');
        exit();
    }
}
