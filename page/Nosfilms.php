<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation Dune</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AShGFRoubd_5oUJ-PLunGwuX0IrRhdp865-SBULmCTsfR2qdDawYdTba91MRJhmJTZey72Lmt4IjV85A"></script>
</head>
<body>
<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php
include ("../back/pdo.php");
$pdo = connectBdd();

// Récupération de l'ID du film depuis l'URL
$filmId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Requête SQL pour récupérer les informations du film
$sql = "SELECT titre, realisateur, duree, datedesortie, affiche, description FROM film WHERE id = ?"; 
$stmt = $pdo->prepare($sql);
$stmt->execute([$filmId]);

if ($stmt->rowCount() > 0) {
    // Récupération des données
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $imageData = base64_encode($row["affiche"]);
    $titre = $row["titre"];
    $realisateur = $row["realisateur"];
    $duree = $row["duree"];
    $date = $row["datedesortie"];
    $description = $row["description"];
} else {
    echo "Aucun résultat trouvé";
    exit;
}
?>

<div class="container_affiche">
    <?php if (isset($imageData)): ?>
        <img src="data:image/jpeg;base64,<?php echo $imageData; ?>" alt="Affiche du film">
    <?php endif; ?>
    <div style="text-align: justify;" class="texte">
        <h1><?php echo isset($titre) ? $titre : ''; ?></h1> <!--titre-->
        <h2>Réalisateur : <strong><?php echo isset($realisateur) ? $realisateur : ''; ?></strong></h2><!--réalisateur-->
        <h3>Durée : <?php echo isset($duree) ? $duree : ''; ?></h3><!--duree-->
        <h3>Date : <?php echo isset($date) ? $date : ''; ?></h3>
        <h4>Synopsis</h4>
        <!--description-->
        <p><?php echo isset($description) ? $description : ''; ?></p>
    </div>
</div>

<div class="container_cinema">
    <img src="../image/isep_vanves.jpeg" alt="Cinéma Isep Vanves">
    <div class="text">
        <h2>Cinéma Isep Vanves</h2>
        <h3>10 Rue de Vanves, 92130 Issy-les-Moulineaux</h3>
        <h4>Tel : 01 49 54 52 00</h4>
    </div>
    <div class="box_seance">
        <?php
        // Requête SQL pour récupérer les séances du film
        $sqlSeances = "SELECT id, horaire FROM seance WHERE id_film = ?";
        $stmtSeances = $pdo->prepare($sqlSeances);
        $stmtSeances->execute([$filmId]);

        if ($stmtSeances->rowCount() > 0) {
            while ($seance = $stmtSeances->fetch(PDO::FETCH_ASSOC)) {
                echo '<button class="button_seance open-popup-btn" data-film-id="' . $filmId . '" data-seance-id="' . $seance['id'] . '" data-horaire="' . $seance['horaire'] . '">Réserver ' . htmlspecialchars($seance['horaire']) . '</button>';
            }
        } else {
            echo "<p>Aucune séance disponible.</p>";
        }
        ?>
    </div>
</div>



<div class="custom-popup-overlay" style="display:none;">
    <div class="custom-popup">
        <span class="popup-text">Réserver</span>
        <span id="film-name" class="film-name"></span>
        <span id="seance-horaire" class="seance-horaire"></span>
        <span id="places-disponibles" class="places-disponibles">0 places disponibles</span>
        <button class="reserve-btn" id="reserve-button">Réserver</button>
        <button class="reserve-btn" id="popup-close">Retour</button>
        <div id="payment-info" style="display:none;">
            <span class="payment-text">Montant à payer : 8 euros</span>
            <div id="paypal-button-container"></div>
        </div>
    </div>
</div>

<script src="film.js"></script>
<?php include('../composant/footer.php'); ?>
</body>
</html>