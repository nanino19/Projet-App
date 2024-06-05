<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<?php

if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") {
    echo '<div class="alert alert-success" role="alert">
      Inscription validée!
    </div>';
}

// Vérifiez s'il y a des messages d'erreur stockés dans la session
if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) {
    echo '<div class="alert alert-danger" role="alert">' .
        $_SESSION["errors_subscribe"] .
    '</div>';
    unset($_SESSION['errors_subscribe']); // Nettoyer les erreurs de la session après les avoir affichées
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Salle</title>
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

    .form-container input[type="text"],
    .form-container input[type="number"],
    .form-container input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-container button {
        width: 30%;
        padding: 10px;
        background-color: #FBD314;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        border: none;
        border-radius: 4px;
        border: solid black 2px;
        cursor: pointer;
        font-size: 16px;
        margin: 0 auto; /* Center the button horizontally */
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
    <div class="form-container">
        <h2>Ajouter une Salle</h2>
        <form method="POST" action="../back/ajoutsalle.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="nbplaces" class="form-label">Nombre de places</label>
                <input type="number" id="nbplaces" name="nbplaces" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>

    <?php include('../composant/footer.php'); ?>
</body>
</html>
