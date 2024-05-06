<?php



include ('../back/fonction_admin.php');

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
$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"> 
    <title>Liste des Utilisateurs</title>
    
</head>
<body>

<h1>Liste des Utilisateurs</h1>

<table >
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['nom'] ?></td>
                <td><?= $user['prenom'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['telephone'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>