

<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php



// Vérifiez si il y a des messages d'erreur stockés dans la session
if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) {
    echo '<div class="alert alert-success" role="alert">' .
        $_SESSION["login_error"]; // Afficher les erreurs.
    '</div>';
    unset($_SESSION['login_error']); // Nettoyer les erreurs de la session après les avoir affichées
}
?>
<div class="cozi">
    <form method="POST" action="../back/connexion.php">
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="col">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn-primary">Connexion</button>
        </div>
    </form>
</div>

<?php include ('../composant/footer.php'); ?>
