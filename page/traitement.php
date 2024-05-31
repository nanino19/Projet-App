<?php

// Inclure le fichier de connexion à la base de données
include_once '../back/pdo.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ message est défini
    if(isset($_POST['message'])) {
        // Récupérer le prénom de l'utilisateur depuis la session
        if (isset($_SESSION['user']['prenom'])) {
            $pseudo = $_SESSION['user']['prenom'];
        } else {
            // Rediriger vers la page du forum avec un message d'erreur si l'utilisateur n'est pas connecté
            header("Location: forum.php?error=1");
            exit();
        }

        // Récupérer le message du formulaire
        $message = $_POST['message'];

        // Connexion à la base de données
        $pdo = connectBdd();

        // Préparer la requête SQL d'insertion
        $stmt = $pdo->prepare("INSERT INTO messages (pseudo, message) VALUES (:pseudo, :message)");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':message', $message);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger vers la page du forum avec un message de succès
            header("Location: forum.php?success=1");
            exit();
        } else {
            // Rediriger vers la page du forum avec un message d'erreur
            header("Location: forum.php?error=1");
            exit();
        }
    } else {
        // Rediriger vers la page du forum avec un message d'erreur si le champ message n'est pas défini
        header("Location: forum.php?error=1");
        exit();
    }
} else {
    // Rediriger vers la page du forum si le formulaire n'a pas été soumis
    header("Location: forum.php");
    exit();
}
?>

