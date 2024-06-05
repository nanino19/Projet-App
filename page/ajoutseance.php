<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>
<?php include('../back/fonction_admin.php'); ?>

<?php

if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") {
    echo '<div class="alert alert-success" role="alert">
      Inscription validée!
    </div>';
}

// Vérifiez si il y a des messages d'erreur stockés dans la session
if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) {
    echo '<div class="alert alert-danger" role="alert">' .
        $_SESSION["errors_subscribe"] .
    '</div>';
    unset($_SESSION['errors_subscribe']); // Nettoyer les erreurs de la session après les avoir affichées
}

$allFilms = getAllFilms();
$allSalles = getAllSalles();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programmer une Projection</title>
    <link rel="stylesheet" href="../style.css"> <!-- Assurez-vous que le chemin est correct -->
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container select, 
        .form-container input[type="time"], 
        .form-container input[type="date"], 
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #FBD314;
            color: white;
            border: none;
            border-radius: 4px;
            border: solid black 2px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: red;
            color: black;
        }

        .alert {
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 4px;
            color: #fff;
            text-align: center;
        }

        .alert-success {
            background-color: #4caf50;
        }

        .alert-danger {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") : ?>
        <div class="alert alert-success" role="alert">
            Inscription validée!
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION["errors_subscribe"]; ?>
        </div>
        <?php unset($_SESSION['errors_subscribe']); ?>
    <?php endif; ?>

    <div class="form-container">
        <h2>Programmer une Projection</h2>
        <form action="../back/ajoutseance.php" method="post">
            <label for="film">Choisir un film:</label>
            <select name="film" id="film">
                <?php foreach ($allFilms as $film) : ?>
                    <option value="<?= $film['id']; ?>"><?= $film['titre']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="salle">Choisir une salle:</label>
            <select name="salle" id="salle">
                <?php foreach ($allSalles as $salle) : ?>
                    <option value="<?= $salle['id']; ?>"><?= $salle['nom']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="horaire">Horaire de la projection (HH:MM):</label>
            <input type="time" id="horaire" name="horaire" required>

            <label for="date">Date de la projection:</label>
            <input type="date" id="date" name="date" required>

            <label for="nombrePlaces">Nombre de places :</label>
            <input type="number" id="nombrePlaces" name="nombrePlaces" required>

            <label for="version">Choisir une version:</label>
            <select name="version" id="version">
                <option value="VF">VF</option>
                <option value="VO">VO</option>
            </select>

            <button type="submit">Programmer la Projection</button>
        </form>
    </div>

    <?php include('../composant/footer.php'); ?>
</body>
</html>
