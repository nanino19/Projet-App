<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>
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
    <style>
        

        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        .container-profil {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .oeoe {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-modifier {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-modifier:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Modifier le profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></h1>
    <div class="container-profil">
        <form action="" method="post" class="oeoe">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($userData['nom']); ?>">

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($userData['prenom']); ?>">

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>">

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($userData['telephone']); ?>">

            <input type="submit" value="Enregistrer les modifications">
        </form>
        <a href="../index.php" class="btn-modifier">Retour à l'accueil</a>
    </div>
</body>

</html>
<?php include ('../composant/footer.php'); ?>
