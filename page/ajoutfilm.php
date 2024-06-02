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

<form method="POST" action="../back/ajoutfilm.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label for="nom" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control">
        </div>
        <div class="col">
            <label for="nom" class="form-label">description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="col">
            <label for="telephone" class="form-label">date de sortie</label>
            <input type="date" id="start" name="datedesortie" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="duree" class="form-label">duree</label>
            <input type="time" id="duree" name="duree" required />
        </div>
        <div class="col">
            <label for="realisateur" class="form-label">Réalisateur</label>
            <input type="text" name="realisateur" class="form-control" id="realisateur">
        </div>
        <div class="col">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="myImage" name="image">
        </div>
        <div class="col">
            <label for="note" class="form-label">Note</label>
            <div class="rating">
                <input type="radio" id="star5" name="note" value="5" class="rating-input" />
                <label for="star5" class="rating-star">&#9733;</label>
                <input type="radio" id="star4" name="note" value="4" class="rating-input" />
                <label for="star4" class="rating-star">&#9733;</label>
                <input type="radio" id="star3" name="note" value="3" class="rating-input" />
                <label for="star3" class="rating-star">&#9733;</label>
                <input type="radio" id="star2" name="note" value="2" class="rating-input" />
                <label for="star2" class="rating-star">&#9733;</label>
                <input type="radio" id="star1" name="note" value="1" class="rating-input" />
                <label for="star1" class="rating-star">&#9733;</label>
            </div>
        </div>

    </div>
    </div>
    <button href="../index.php"type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php include('../composant/footer.php'); ?>