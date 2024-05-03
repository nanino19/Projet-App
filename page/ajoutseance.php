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

<form action="submit_projection.php" method="post">
        <!-- Liste déroulante pour les films -->
        <label for="film">Choisir un film:</label>
        <select name="film" id="film">
            <!-- Les options devraient être générées dynamiquement à partir de la base de données -->
            <option value="1">Film 1</option>
            <option value="2">Film 2</option>
            <option value="3">Film 3</option>
            <!-- etc. -->
        </select><br><br>

        <!-- Liste déroulante pour les salles -->
        <label for="salle">Choisir une salle:</label>
        <select name="salle" id="salle">
            <!-- Les options devraient être générées dynamiquement à partir de la base de données -->
            <option value="101">Salle 101</option>
            <option value="102">Salle 102</option>
            <option value="103">Salle 103</option>
            <!-- etc. -->
        </select><br><br>

        <!-- Input pour l'horaire -->
        <label for="horaire">Horaire de la projection (HH:MM):</label>
        <input type="time" id="horaire" name="horaire" required><br><br>

        <!-- Input pour la date -->
        <label for="date">Date de la projection:</label>
        <input type="date" id="date" name="date" required><br><br>

        <!-- Bouton de soumission -->
        <button type="submit">Programmer la Projection</button>
    </form>

<?php include('../composant/footer.php'); ?>