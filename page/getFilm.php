<?php
$host = "herogu.garageisep.com";
$dbname = "ZdBjCh2KHG_cinemanage";
$login = "qrscXGXvdi_cinemanage"; // root
$password = "30s310qKDR2WnzuA";

// Créez une connexion
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérez le nom du film basé sur l'ID passé en paramètre
$film_id = $_GET['id'];
$sql = "SELECT * FROM film WHERE id = $film_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichez les données du film
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Film non trouvé']);
}

$conn->close();



// Récupérez les informations de la séance basée sur l'ID du film et l'horaire passé en paramètre
$film_id = $_GET['id'];
$horaire = $_GET['horaire'];
$sql = "SELECT * FROM séance WHERE id = $film_id AND Horaire = '$horaire'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichez les données de la séance
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Séance non trouvée']);
}

$conn->close();
?>