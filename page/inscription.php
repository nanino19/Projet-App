<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<?php
session_start();

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

<form method="POST" action="../back/inscription.php">
    <div class="row">
        <div class="col">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="col">
            <label for="nom" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control">
        </div>
        <div class="col">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="tel" name="tel" class="form-control" id="tel">
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Well never share your email with anyone else.</div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pwd1" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Confirmer votre Password</label>
            <input type="password" name="pwd2" class="form-control" id="exampleInputPassword1">
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include('../composant/footer.php'); ?>