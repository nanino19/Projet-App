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
            width: 20%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
            margin-bottom: 20px;
            font-family: 'Koulen';
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container-profil p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            width: 100%; /* Ensure the paragraphs take the full width of the container */
            text-align: left; /* Align text to the left for readability */
        }

        .container-profil a {
            display: block; /* Change en bloc pour empiler verticalement */
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center; /* Centrer le texte dans les boutons */
            width: 80%; /* Largeur des boutons */
        }

        .container-profil a:hover {
            background-color: #0056b3;
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
        <p>Prenom : <?php echo $userData['prenom']; ?></p>
        <p>Email : <?php echo $userData['email']; ?></p>
        <p>Telephone : <?php echo $userData['telephone']; ?></p>
        <a href="modifier.php" class="btn-primary">Modifier </a> 
        <a href="../back/logout.php" class="btn-primary">Se deconnecter</a>
        <a href="../index.php" class="btn-primary">Retour a l'accueil</a>
    </div>
</body>
<?php include ('../composant/footer.php'); ?>
</html>
