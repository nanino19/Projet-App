<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemanager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => "La connexion a échoué: " . $conn->connect_error]));
}

$id_film = intval($_GET['id_film']);
$horaire = $conn->real_escape_string($_GET['horaire']);

// Utiliser le nom correct de la colonne entouré de backticks
$sql = "SELECT `nombre de places`, horaire, film FROM seance WHERE id_film = ? AND horaire = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['error' => 'Erreur lors de la préparation de la requête: ' . $conn->error]);
    exit;
}

$stmt->bind_param("is", $id_film, $horaire);
$stmt->execute();
$stmt->bind_result($nombre_de_places, $horaire, $film);
$stmt->fetch();

if ($nombre_de_places !== null) {
    echo json_encode(['nombre_de_places' => $nombre_de_places, 'horaire' => $horaire, 'film' => $film]);
} else {
    echo json_encode(['error' => 'Séance non trouvée']);
}

$stmt->close();
$conn->close();
?>