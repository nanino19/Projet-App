<?php

include("fonction.php");
echo($_POST["email"]);
echo($_POST["pwd1"]);
echo($_POST["pwd2"]);
echo($_POST["nom"]);
echo($_POST["prenom"]);
echo($_POST["tel"]);


// Vérification de l'existence de données POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'email
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        echo "L'email est requis.<br>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide.<br>";
    }

    // Vérification du mot de passe
    if (!isset($_POST["pwd1"]) || !isset($_POST["pwd2"]) || empty($_POST["pwd1"]) || empty($_POST["pwd2"])) {
        echo "Les deux champs de mot de passe sont requis.<br>";
    } elseif ($_POST["pwd1"] !== $_POST["pwd2"]) {
        echo "Les mots de passe ne correspondent pas.<br>";
    }

    // Vérification du nom et prénom
    if (!isset($_POST["nom"]) || !isset($_POST["prenom"]) || empty($_POST["nom"]) || empty($_POST["prenom"])) {
        echo "Le nom et le prénom sont requis.<br>";
    }

    // Vérification du numéro de téléphone
    if (!isset($_POST["tel"]) || empty($_POST["tel"])) {
        echo "Le numéro de téléphone est requis.<br>";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["tel"])) {
        echo "Le numéro de téléphone n'est pas valide.<br>";
    }

    insererUtilisateur($_POST["email"],$_POST["pwd1"],$_POST["nom"],$_POST["prenom"],$_POST["tel"]);

}
?>

