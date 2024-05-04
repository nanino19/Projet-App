<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<?php

if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") {
    echo '<div class="alert alert-success" role="alert">
      Inscription validée!
    </div>';
}
// Vérifiez si il y a des messages d'erreur stockés dans la session
if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) {
    echo '<div class="alert alert-success" role="alert">' .
        $_SESSION["errors_subscribe"]; // Afficher les erreurs.
    '</div>';
    unset($_SESSION['errors_subscribe']); // Nettoyer les erreurs de la session après les avoir affichées
}
?>

<form method="POST" action="../back/ajoutsalle.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="col">
            <label for="nom" class="form-label">description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="col">
            <label for="nbplaces" class="form-label">nbplaces</label>
            <input type="number" id="nbplaces" name="nbplaces" />
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include('../composant/footer.php'); ?>