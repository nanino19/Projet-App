<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php
include ("../back/pdo.php");
$pdo = connectBdd();

// Récupération de l'ID du film depuis l'URL
$filmId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Requête SQL pour récupérer les informations du film
$sql = "SELECT titre, realisateur, duree, datedesortie, affiche, description FROM film WHERE id = ?"; // Utilisation de l'ID pour obtenir les détails du film
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
<div id="seancee" class="container_banniere">
	<a href="#seancee" class="jour">
		<h2>Aujourd'hui</h2>
	</a>
	<a href="#seancee" class="jour">
		<h2>Demain</h2>
	</a>
	<a href="#seancee" class="jour">
		<h2>Mercredi</h2>
	</a>
	<a href="#seancee" class="jour">
		<h2>Jeudi</h2>
	</a>
	<a href="#seancee" class="jour">
		<h2>Vendredi</h2>
	</a>
</div>
<div class="container_cinema">
	<img src="../image/isep_vanves.jpeg" alt="Cinéma Isep Vanves">
	<div class="text">
		<h2>Cinéma Isep Vanves</h1>
			<h3>10 Rue de Vanves, 92130 Issy-les-Moulineaux
		</h2>
		<h4>Tel : 01 49 54 52 00</h3>
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
