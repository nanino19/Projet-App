<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemanager";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Requête pour obtenir les séances et les informations sur les films
$sql = "SELECT seance.id, seance.`nombre de places`, film.titre 
        FROM seance 
        JOIN film ON seance.id_film = film.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salle de cinéma</title>
    <style>
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .seat {
            width: 30px;
            height: 60px; /* Hauteur ajustée pour ressembler à un siège */
            margin: 5px;
            background-color: #ccc;
            border: 1px solid #000;
            border-radius: 5px;
        }

        .reserved {
            background-color: red;
        }

        .legend {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-item span {
            margin-left: 5px;
        }

        .legend .reserved {
            width: 20px;
            height: 20px;
            background-color: red;
        }

        .legend .free {
            width: 20px;
            height: 20px;
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h1>Nombre de sièges disponibles par séance</h1>';

    // Parcourir les résultats et afficher les informations
    while($row = $result->fetch_assoc()) {
        $totalSeats = 30;
        $availableSeats = $row["nombre de places"];
        $reservedSeats = $totalSeats - $availableSeats;

        echo '<h2>Film: ' . $row["titre"] . ' - Séance ID: ' . $row["id"] . '</h2>';
        echo '<p>Nombre de sièges disponibles: ' . $availableSeats . '</p>';

        // Affichage des sièges en fonction du nombre de réservations
        for ($rowNum = 1; $rowNum <= ceil($totalSeats / 10); $rowNum++) {
            echo '<div class="row">';
            for ($seat = 1; $seat <= 10; $seat++) {
                $seatNumber = ($rowNum - 1) * 10 + $seat;
                if ($seatNumber > $totalSeats) break; // Arrêter si on dépasse le nombre total de sièges

                // Vérifier si le siège est réservé
                if ($seatNumber <= $reservedSeats) {
                    echo '<div class="seat reserved"></div>';
                } else {
                    echo '<div class="seat"></div>';
                }
            }
            echo '</div>';
        }
    }

    echo '<div class="legend">
            <div class="legend-item">
                <div class="reserved"></div>
                <span>Siège réservé</span>
            </div>
            <div class="legend-item">
                <div class="free"></div>
                <span>Siège libre</span>
            </div>
        </div>';

    echo '</body>
</html>';

} else {
    echo "Aucun résultat trouvé.";
}

$conn->close();
?>
<?php include ('../composant/footer.php'); ?>
