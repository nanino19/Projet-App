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
    echo '<div class="alert alert-success" role="alert">' .
        $_SESSION["errors_subscribe"]; // Afficher les erreurs.
    '</div>';
    unset($_SESSION['errors_subscribe']); // Nettoyer les erreurs de la session après les avoir affichées
}

$allFilms = getAllFilms();
$allSalles = getAllSalles();

?>

<form action="../back/ajoutseance.php" method="post">
    <!-- Liste déroulante pour les films -->
    <label for="film">Choisir un film:</label>
    <select name="film" id="film">
        <!-- Les options devraient être générées dynamiquement à partir de la base de données -->
        <?php
        for ($i = 0; $i < count($allFilms); $i++) {
            echo '<option value="' . $allFilms[$i]['id'] . '">' . $allFilms[$i]['titre'] . '</option>';
        }
        ?>
        <!-- etc. -->
    </select><br><br>

    <!-- Liste déroulante pour les salles -->
    <label for="salle">Choisir une salle:</label>
    <select name="salle" id="salle">
        <?php
        for ($i = 0; $i < count($allSalles); $i++) {
            echo '<option value="' . $allSalles[$i]['id'] . '">' . $allSalles[$i]['nom'] . '</option>';
        }
        ?>
        <!-- etc. -->
    </select><br><br>

    <!-- Input pour l'horaire -->
    <label for="horaire">Horaire de la projection (HH:MM):</label>
    <input type="time" id="horaire" name="horaire" required><br><br>

    <!-- Input pour la date -->
    <label for="date">Date de la projection:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="version">Choisir une version:</label>
    <select name="version" id="version">
        <option value="VF">VF</option>
        <option value="VO">VO</option>
    </select><br>

    <!-- Bouton de soumission -->
    <button type="submit">Programmer la Projection</button>
</form>

<?php include('../composant/footer.php'); ?>