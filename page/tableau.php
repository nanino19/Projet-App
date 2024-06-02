<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemanager";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}


$sql = "SELECT `nombre de places` FROM seance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $totalSeats = $result->fetch_assoc()["nombre de places"];

    
    $reservedSeats = 30 - $totalSeats;

    
    $availableSeats = $totalSeats - $reservedSeats;

    
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
    <h1>Nombre de sièges disponibles</h1>';

    // Affichage des sièges en fonction du nombre de réservations
    for ($row = 1; $row <= 3; $row++) {
        echo '<div class="row">';
        for ($seat = 1; $seat <= 10; $seat++) {
            // Vérifier si le siège est réservé
            if (($row - 1) * 10 + $seat <= $reservedSeats) {
                echo '<div class="seat reserved"></div>';
            } else {
                echo '<div class="seat"></div>';
            }
        }
        echo '</div>';
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
