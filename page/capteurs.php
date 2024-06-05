<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>
<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capteur</title>
    <link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
       

        h1 {
            color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
            position: relative;
        }

        .box h2 {
            color: #007BFF;
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

<h1>Capteur</h1>

<div class="container">
    <div class="box">
        <h2>Film: Nom du Film 1</h2>
        <p>Puissance en DB: X</p>
        <p>Seuil d’audibilité: Pénible</p>
        <div class="gauge">
            <span style="width: X%;"></span>
        </div>
    </div>
    <div class="box">
        <h2>Film: Nom du Film 2</h2>
        <p>Puissance en DB: Y</p>
        <p>Seuil d’audibilité: Non Pénible</p>
        <div class="gauge">
            <span style="width: Y%;"></span>
        </div>
    </div>
</div>

</body>
<?php include ('../composant/footer.php'); ?>
</html>
