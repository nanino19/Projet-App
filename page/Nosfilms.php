<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation Dune</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('../composant/header.php'); ?>
    <?php include('../composant/menu.php'); ?>

    <div class="container_affiche">
        <img src="../image/affiche_film.jpg" alt="Description de l'image">
        <div class="texte">
            <h1>Dune</h1>
            <h2>De <strong>Denis Villeneuve</strong></h2>
            <h3>Durée : 2H36</h3>
            <h3>Date : 7 février 2024</h3>
            <h4>Synopsis</h4>
            <p>L'histoire de Paul Atreides...</p>
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
            <button class="button_seance open-popup-btn" data-film-id="1" data-horaire="19:30">Réserver 19H30</button>
            <button class="button_seance open-popup-btn" data-film-id="1" data-horaire="22:30">Réserver 22H30</button>
        </div>
    </div>

    <div class="container_cinema">
        <img src="../image/isep_raspail.jpg" alt="Cinéma Isep Raspail">
        <div class="text">
            <h2>Cinéma Isep Raspail</h2>
            <h3>28 Rue Notre Dame des Champs, 75006 Paris</h3>
            <h4>Tel : 01 49 54 52 00</h4>
        </div>
        <div class="box_seance">
            <button class="button_seance open-popup-btn" data-film-id="1" data-horaire="14:00">Réserver 14H00</button>
            <button class="button_seance open-popup-btn" data-film-id="1"data-horaire="16:00">Réserver 16H00</button>
            <button class="button_seance open-popup-btn" data-film-id="1"data-horaire="18:00">Réserver 18H00</button>
            <button class="button_seance open-popup-btn" data-film-id="1"data-horaire="20:30">Réserver 20H30</button>
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
        </div>
    </div>

    <script src="film.js"></script>
    <?php include('../composant/footer.php'); ?>
</body>
</html>
