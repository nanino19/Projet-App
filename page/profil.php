<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php
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
    <style>
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .container-profil {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
            margin-bottom:20px;
        }

        .container-profil p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
        }

        .container-profil a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .container-profil a:hover {
            background-color: #0056b3;
        }

        .btn-modifier {
            display: block;
            width: fit-content;
            margin: 10px auto;
            text-align: center;
        }

        .btn-modifier:last-of-type {
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .container-profil {
                width: 80%;
            }
        }

        @media (max-width: 480px) {
            .container-profil {
                width: 90%;
            }
            
            .container-profil p {
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <h1>Profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></h1>
    <div class="container-profil">
        <p>Nom : <?php echo $userData['nom']; ?></p>
        <p>Prénom : <?php echo $userData['prenom']; ?></p>
        <p>Email : <?php echo $userData['email']; ?></p>
        <p>Téléphone : <?php echo $userData['telephone']; ?></p>
        <a href="modifier.php" class="btn-modifier">Modifier les informations</a> 
        <a href="../back/logout.php" class="btn-modifier">Se deconnecter</a>
        <a href="../index.php" class="btn-modifier">Retour à l'accueil</a>
    </div>
</body>
<?php include ('../composant/footer.php'); ?>
</html>
