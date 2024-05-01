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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $newNom = $_POST['nom'];
    $newPrenom = $_POST['prenom'];
    $newEmail = $_POST['email'];
    $newTelephone = $_POST['telephone'];

    
    try {
        $pdo = connectBdd(); 
        if ($pdo) { 
            $stmt = $pdo->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?");
            $stmt->execute([$newNom, $newPrenom, $newEmail, $newTelephone, $user['id']]);
            
            header("Location: profil.php");
            exit();
        } else {
            throw new Exception("Erreur de connexion à la base de données.");
        }
    } catch (Exception $e) {
       
        echo "Erreur : " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></title>
    <link rel="stylesheet" href="../style.css"> 
</head>

<body>
    
    <h1>Modifier le profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></h1>
    <div class="container-profil">
    <form action="" method="post" class="oeoe">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $userData['nom']; ?>"><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $userData['prenom']; ?>"><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>"><br><br>

        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone" value="<?php echo $userData['telephone']; ?>"><br><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
    </div>
    <a href="../index.php" class="btn-modifier">Retour à l'accueil</a> 
</body>

</html>
