<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemanager";

// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérez les informations passées en paramètre
$film_id = $_GET['id'];
$horaire = $_GET['horaire'];

// Récupérer le nombre de places disponibles actuelles
$sql = "SELECT PlacesDisponibles FROM seance WHERE id = $film_id AND Horaire = '$horaire'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer le nombre de places disponibles
    $row = $result->fetch_assoc();
    $places_disponibles = $row['PlacesDisponibles'];
    
    // Vérifiez s'il reste des places disponibles
    if ($places_disponibles > 0) {
        // Mettre à jour le nombre de places disponibles en réduisant de 1
        $new_places = $places_disponibles - 1;
        $update_sql = "UPDATE seance SET PlacesDisponibles = $new_places WHERE id = $film_id AND Horaire = '$horaire'";
        
        if ($conn->query($update_sql) === TRUE) {
            echo json_encode(['success' => 'Réservation effectuée avec succès']);
        } else {
            echo json_encode(['error' => 'Erreur lors de la mise à jour des places disponibles']);
        }
    } else {
        echo json_encode(['error' => 'Aucune place disponible']);
    }
} else {
    echo json_encode(['error' => 'Séance non trouvée']);
}

$conn->close();
?>
