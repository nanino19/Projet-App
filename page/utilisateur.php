<?php
include ('../composant/header.php');
include ('../composant/menu.php');
include ('../back/fonction_admin.php');

// Fonction pour récupérer tous les utilisateurs
function getAllUsers() {
    try {
        $pdo = connectBdd(); 
        $query = "SELECT * FROM utilisateur";
        $stmt = $pdo->query($query);
        
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    } catch (Exception $e) {
        return [];
    }
}

// Logique de suppression de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = intval($_POST['user_id']);
    
    if (deleteUser($userId)) {
        // Rediriger vers la page des utilisateurs après la suppression
        header('Location: utilisateur.php');
        exit();
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
}

// Récupérer tous les utilisateurs
$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"> 
    <title>Liste des Utilisateurs inscrits sur le site</title>
</head>
<body>
<style>
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: auto;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #ddd;
    }

    @media (max-width: 600px) {
        table {
            width: 100%;
        }
    }
</style>

<h1>Liste des Utilisateurs</h1>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['nom']) ?></td>
                <td><?= htmlspecialchars($user['prenom']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['telephone']) ?></td>
                <td>
                    <form method="post" action="utilisateur.php">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include ('../composant/footer.php'); ?>
</body>
</html>
