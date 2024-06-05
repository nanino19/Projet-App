<?php
$host = "herogu.garageisep.com";
$dbname = "ZdBjCh2KHG_cinemanage";
$login = "qrscXGXvdi_cinemanage"; // root
$password = "30s310qKDR2WnzuA";

$conn = new mysqli($host, $login, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => "La connexion a échoué: " . $conn->connect_error]));
}

$id_film = intval($_GET['id_film']);
$horaire = $conn->real_escape_string($_GET['horaire']);

// Utiliser le nom correct de la colonne entouré de backticks
$sql = "SELECT `nombre de places` FROM seance WHERE id_film = ? AND horaire = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['error' => 'Erreur lors de la préparation de la requête: ' . $conn->error]);
    exit;
}

$stmt->bind_param("is", $id_film, $horaire);
$stmt->execute();
$stmt->bind_result($nombre_de_places);
$stmt->fetch();
$stmt->close();

if ($nombre_de_places !== null && $nombre_de_places > 0) {
    $nouveau_nombre_de_places = $nombre_de_places - 1;
    $update_sql = "UPDATE seance SET `nombre de places` = ? WHERE id_film = ? AND horaire = ?";
    $update_stmt = $conn->prepare($update_sql);
    
    if ($update_stmt === false) {
        echo json_encode(['error' => 'Erreur lors de la préparation de la requête de mise à jour: ' . $conn->error]);
        exit;
    }
    
    $update_stmt->bind_param("iis", $nouveau_nombre_de_places, $id_film, $horaire);
    if ($update_stmt->execute()) {
        echo json_encode(['success' => 'Réservation effectuée avec succès']);
    } else {
        echo json_encode(['error' => 'Erreur lors de l\'exécution de la mise à jour: ' . $update_stmt->error]);
    }
    $update_stmt->close();
} else {
    echo json_encode(['error' => 'Aucune place disponible']);
}

$conn->close();
?>
