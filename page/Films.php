<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php

include('../back/pdo.php');


function getAllFilms() {
    try {
        $pdo = connectBdd(); 
        $query = "SELECT titre, affiche FROM film"; 
        $stmt = $pdo->query($query);
        $films = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $films;
    } catch (Exception $e) {
        return []; 
    }
}


$films = getAllFilms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">
    <title>Liste des Films</title>
    <style>
        h1 {
            font-family: Koulen;
            text-align: center;
            margin-bottom: 20px;
        }
        .oui {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            border: 2px solid #7C2D13;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: auto;
            margin: 40px 20px;
        }
        .films-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .film {
            display: inline-block;
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 10px;
            position: relative;
        }
        .film img {
            max-width: 200px;
            max-height: 300px;
            transition: transform 0.3s ease;
        }
        .film img:hover {
            transform: scale(1.1);
        }
        .gauge {
            position: relative;
            height: 20px;
            width: 100%;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }
        .gauge span {
            display: block;
            height: 100%;
            border-radius: 10px;
            animation: gauge-animation 3s ease-in-out infinite;
        }
        @keyframes gauge-animation {
            0% { width: 0%; background-color: green; }
            50% { width: 100%; background-color: yellow; }
            100% { width: 0%; background-color: red; }
        }
    </style>
</head>
<body>
    <div class="oui">
        <h1>Nos films en salle</h1>
        <div class="films-container">
            <?php foreach ($films as $film): ?>
                <div class="film">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($film['affiche']); ?>" alt="<?php echo htmlspecialchars($film['titre'], ENT_QUOTES, 'UTF-8'); ?>">
                    <p><?php echo htmlspecialchars($film['titre'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="gauge">
                        <h2>Film: <?php echo htmlspecialchars($film['titre'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p>Puissance en DB: X</p>
                        <p>Seuil d’audibilité: Pénible</p>
                        <div class="gauge">
                            <span style="width: X%;"></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
<?php include ('../composant/footer.php'); ?>
</html>
