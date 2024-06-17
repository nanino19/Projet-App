<?php

session_start();
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
    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        $msgErrors .= "Le mot de passe est requis.<br>";
    }

    if (strlen($msgErrors) == 0) {
        try {
            $pdo = connectBdd();

            // Requête SQL préparée pour vérifier l'existence d'un utilisateur avec l'email spécifié
            $requete = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $requete->bindParam(':email', $_POST["email"]);
            $requete->execute();
            $user = $requete->fetch();

            if ($user && password_verify($_POST["password"], $user['password'])) {
                $_SESSION['user'] = $user; // Créer une session pour l'utilisateur
                // Redirection vers la page de succès
                header('Location: ../index.php?msg=login_success');
                exit();
            } else {
                // Redirection vers la page de connexion avec un message d'erreur
                $_SESSION['login_error'] = "Email ou mot de passe incorrect.";
                header('Location: ../page/moncompte.php?msg=login_error');
                exit();
            }
        } catch (PDOException $e) {
            // En cas d'erreur, afficher l'erreur
            $_SESSION['login_error'] = "Erreur dans la base de données : " . $e->getMessage();
            header('Location: ../page/moncompte.php?msg=login_error');
            exit();
        }
    } else {
        // Stocker les erreurs dans la session
        $_SESSION['login_error'] = $msgErrors;
        header('Location: ../page/moncompte.php?msg=login_error');
        exit();
    }
}
?>
