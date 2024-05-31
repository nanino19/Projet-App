<?php
// Inclure le fichier de connexion à la base de données
include_once '../back/pdo.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis
    if(isset($_POST['pseudo']) && isset($_POST['message'])) {
        // Récupérer les valeurs du formulaire
        $pseudo = $_POST['pseudo'];
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
        // Rediriger vers la page du forum avec un message d'erreur si les champs requis ne sont pas définis
        header("Location: forum.php?error=1");
        exit();
    }
} else {
    // Rediriger vers la page du forum si le formulaire n'a pas été soumis
    header("Location: forum.php");
    exit();
}
?>
