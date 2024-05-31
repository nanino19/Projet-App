<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>
<?php


// Vérifier si l'utilisateur est connecté, sinon afficher un message et rediriger vers la page de connexion
if (!isset($_SESSION['user'])) {
    echo "<div class='error-message'>Veuillez vous connecter avant de pouvoir accéder au forum.</div>";
    echo "<div class='error-message'><a class='login-button' href='../page/connexion.php'>Se connecter</a></div>";
    exit(); // Arrêter l'exécution du script
}


// Récupérer le prénom de l'utilisateur depuis la session
$prenom = isset($_SESSION['user']['prenom']) ? $_SESSION['user']['prenom'] : '';

// Inclure le fichier de connexion à la base de données
include_once '../back/pdo.php';

// Traitement du formulaire de soumission de message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'traitement.php'; // Assurez-vous que le script de traitement est inclus
}


// Pagination
$messages_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $messages_per_page;
?>

<!DOCTYPE html>
<html>
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
            <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($prenom); ?>" readonly><br><br>
            
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

                // Récupérer les messages du forum depuis la base de données avec pagination
                $stmt = $pdo->prepare("SELECT pseudo, message, created_at FROM messages ORDER BY created_at DESC LIMIT :offset, :messages_per_page");
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindParam(':messages_per_page', $messages_per_page, PDO::PARAM_INT);
                $stmt->execute();
                $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($messages as $message) : ?>
                    <li class="message-container">
                        <div class="message-date"><?php echo $message['created_at']; ?></div>
                        <div class="message-content">
                            <strong><?php echo htmlspecialchars($message['pseudo']); ?>:</strong>
                            <?php echo htmlspecialchars($message['message']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Pagination -->
            <div class="pagination">
                <?php
                $stmt = $pdo->query("SELECT COUNT(*) FROM messages");
                $total_messages = $stmt->fetchColumn();
                $total_pages = ceil($total_messages / $messages_per_page);

                for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php include ('../composant/footer.php'); ?>
