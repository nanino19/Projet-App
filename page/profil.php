<?php
session_start();


if (!isset($_SESSION['user'])) {
    
    header("Location: page/connexion.php");
    exit();
}


include("../back/pdo.php");


$user = $_SESSION['user'];


try {
    $pdo = connectBdd(); 
    if ($pdo) { 
        $stmt = $pdo->prepare("SELECT nom, prenom, email, telephone FROM utilisateur WHERE id = ?");
        $stmt->execute([$user['id']]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        throw new Exception("Erreur de connexion à la base de données.");
    }
} catch (Exception $e) {
    
    echo "Erreur : " . $e->getMessage();
    exit();
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></title>
    <link rel="stylesheet" href="../style.css"> 
</head>

<body>
    <h1>Profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></h1>
    <div class="container-profil">
        <p>Nom : <?php echo $userData['nom']; ?></p>
        <p>Prénom : <?php echo $userData['prenom']; ?></p>
        <p>Email : <?php echo $userData['email']; ?></p>
        <p>Téléphone : <?php echo $userData['telephone']; ?></p>
       <br><br>
        <a href="modifier.php" class="btn-modifier">Modifier les informations</a> 
    </div>
    </div>

    
    <a href="../index.php" class="btn-modifier">Retour à l'accueil</a> 
    </div>
</body>

</html>
