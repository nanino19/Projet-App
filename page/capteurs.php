<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capteur</title>
    <link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Header -->
    <?php include("header.php"); ?>

    <h1>Capteur</h1>

    <div class="container">
        <div class="box">
            <h2>Film: Nom du Film 1</h2>
            <p>Puissance en DB: X</p>
            <p>Seuil d’audibilité: Pénible</p>
        </div>
        <div class="box">
            <h2>Film: Nom du Film 2</h2>
            <p>Puissance en DB: Y</p>
            <p>Seuil d’audibilité: Non Pénible</p>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>

</body>

</html>