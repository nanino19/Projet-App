<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>
<?php
// Inclure le fichier de connexion à la base de données
include_once '../back/pdo.php'; 

// Traitement du formulaire de soumission de message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'traitement.php'; 
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum de discussion</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Assurez-vous que le chemin est correct -->
</head>
<body>
    <div class="container4">
        <h1>Forum de discussion</h1>

        <!-- Afficher le formulaire de soumission de message -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Champs pour le pseudo (pré-rempli si l'utilisateur est connecté) -->
            <label for="pseudo">Pseudo:</label>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo $_SESSION['pseudo'] ?? ''; ?>" required><br><br>
            
            <!-- Champ pour le message -->
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
            
            <!-- Bouton pour soumettre le formulaire -->
            <input type="submit" value="Envoyer">
        </form>

        <!-- Liste des messages du forum -->
        <div>
            <h2>Liste des messages du forum</h2>
            <ul>
                <?php
                // Connexion à la base de données
                $pdo = connectBdd();

                // Récupérer les messages du forum depuis la base de données
                $stmt = $pdo->query("SELECT pseudo, message FROM messages");
                $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($messages as $message) : ?>
                    <li>
                        <strong><?php echo htmlspecialchars($message['pseudo']); ?>:</strong>
                        <?php echo htmlspecialchars($message['message']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

<?php include ('../composant/footer.php'); ?>
