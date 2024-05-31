<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php
// Inclure le fichier de connexion à la base de données
include('../back/pdo.php');
 
// Fonction pour récupérer tous les films de la base de données
function getAllFilms() {
    try {
        $pdo = connectBdd(); // Connexion à la base de données
        $query = "SELECT titre, affiche FROM film"; // Requête SQL pour récupérer les titres et les affiches des films
        $stmt = $pdo->query($query);
        $films = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer les résultats sous forme de tableau associatif
        return $films;
    } catch (Exception $e) {
        return []; // Retourner un tableau vide en cas d'erreur
    }
}

// Appel de la fonction pour récupérer tous les films
$films = getAllFilms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">
    <title>Liste des Films</title>
    <style>
        h1{
            font-family:Koulen
        }
        .film {
            display: inline-block;
            margin: 10px;
        }
        .film img {
            max-width: 200px;
            max-height: 300px;
        }
        .activity-card{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Nos films en salle</h1>
    <div class="activity-card">
    <div class="films-container">
        <?php foreach ($films as $film): ?>
            <div class="film">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($film['affiche']); ?>" alt="<?php echo htmlspecialchars($film['titre'], ENT_QUOTES, 'UTF-8'); ?>">
                <p><?php echo htmlspecialchars($film['titre'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</body>
</html>
