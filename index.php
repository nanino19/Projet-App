<!DOCTYPE html>
<html>

<head>
	<link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
		integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>cinemanager</title>
	<meta charset="utf-8">
</head>

<body>
	<?php
	session_start();

	include ("back/pdo.php"); // Inclure le fichier pdo.php pour obtenir la connexion PDO
	
	// Rediriger les messages d'erreur vers le journal des erreurs du serveur
	ini_set('log_errors', 1);
	ini_set('error_log', 'php_errors.log');


	if (isset($_GET['msg']) && $_GET['msg'] == "login_success" && isset($_SESSION["user"])) {

	}

	// Vérifiez si il y a des messages d'erreur stockés dans la session
	if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) {
		echo '<div class="alert alert-success" role="alert">' .
			$_SESSION["login_error"]; // Afficher les erreurs.
		'</div>';
		unset($_SESSION['login_error']); // Nettoyer les erreurs de la session après les avoir affichées
	
	}



	//code correspondant à la requête bdd pour la barre de recherche
	@$keywords = $_GET["keywords"];
	@$valider = $_GET["valider"];
	if (isset($valider) && !empty(trim($keywords))) {
		$words = explode(" ", trim($keywords));
		for ($i = 0; $i < count($words); $i++)
			$kw[$i] = "titre like '%" . $words[$i] . "%' ";
		$pdo = connectBdd(); // Appeler la fonction connectBdd() pour obtenir la connexion PDO
		if ($pdo) { // Vérification de la connexion à la base de données
			$res = $pdo->prepare("select titre from film where " . implode(" OR ", $kw)); //lorsqu'on met plusieurs mots dans la barre de recherche, c'est pris en compte
			$res->setFetchMode(PDO::FETCH_ASSOC);
			$res->execute();
			$tab = $res->fetchAll();
			$afficher = "oui";
		} else {
			error_log("Erreur de connexion à la base de données."); // Envoyer le message d'erreur au journal des erreurs du serveur
		}
		// Afficher la réponse sous forme d'alerte
		if (@$afficher == "oui" && count($tab) > 0) {
			$resultMessage = count($tab) . " " . (count($tab) > 1 ? "résultats trouvés" : "résultat trouvé");
			foreach ($tab as $film) {
				$resultMessage .= "\n" . $film["titre"];
			}
			$resultMessage = rawurlencode($resultMessage);
			echo "<script>alert(decodeURIComponent('" . $resultMessage . "'));</script>";
			$keywords = "";
		} elseif (@$afficher == "oui" && count($tab) == 0) {
			echo "<script>alert('Aucun résultat trouvé.');</script>";
		}
	}
	?>
	<script>

		function clearSearch() {
			document.getElementById('searchInput').value = '';
		}
	</script>
	<div class="header">
		<a href="index.php" class="logo-container">
			<img src="image/logo.png" alt="Logo" class="logo">
		</a>
		<form name="fo" method="get" action="" class="search-form">
			<input type="search" id="searchInput" name="keywords" value="<?php echo $keywords ?>"
				placeholder="Rechercher un film">
			<input type="submit" name="valider" value="Rechercher">
			<button type="button" onclick="clearSearch()">X</button>
		</form>
		<nav class="menu">
			<ul>
				<li><a href="page/Nousdecouvrir.php">Nous decouvrir</a></li>
				<li><a href="page/nosfilms.php">Films</a></li>
				<li><a href="page/faq.php">Forum</a></li>
				<?php if (isset($_SESSION['user'])): ?>
					<li><a href="page/profil.php">Bienvenue,
							<?php echo htmlspecialchars($_SESSION['user']['prenom']) . ' ' . htmlspecialchars($_SESSION['user']['nom']); ?></a>
					</li>
					<li><a href="back/logout.php">Deconnexion</a></li>
				<?php else: ?>
					<li><a href="page/connexion.php">Se connecter</a></li>
					<li><a href="page/inscription.php">Creer un Compte</a></li>
				<?php endif; ?>



			</ul>
		</nav>
	</div>





	<!-- carousel -->
	<div class="carousel">

		<!-- list item -->
		<div class="list">
			<div class="item">
				<img src="image/banniere1.jpg">
				<div class="contents">
					<div class="title">Ils sont de retour</div>
					<div class="topic">DC COMICS</div>
					<div class="des">
						<!-- description -->
						Les films DC Comics captivent les spectateurs avec leurs récits épiques et leurs personnages
						emblématiques. Des débuts de Batman dans "Batman Begins" aux aventures cosmiques de "Justice
						League", en passant par l'exploration des origines de Superman dans "Man of Steel" et le voyage
						de découverte de soi de Wonder Woman dans son film éponyme, chaque film offre une immersion dans
						l'univers complexe et fascinant des super-héros et des supervilains. Avec des thèmes universels
						tels que le sacrifice, la justice et le pouvoir, ces films apportent une dose d'action, de
						suspense et d'émotion qui séduit un large public, faisant ainsi honneur au riche héritage des
						bandes dessinées DC Comics.
					</div>
					<div class="buttons">
						<button>VOIR</button>
						<button>RESERVER</button>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="image/anneau.jpg">
				<div class="contents">
					<div class="title">REDECOUVREZ</div>
					<div class="topic">LE SEIGNEUR DES ANNEAUX</div>
					<div class="des">

						Dans "Le Seigneur des Anneaux", une épopée cinématographique dirigée par Peter Jackson, les
						spectateurs sont transportés dans un monde fantastique où la magie, l'héroïsme et l'amitié se
						mêlent dans une lutte épique entre le bien et le mal. Suivant les aventures de Frodo Baggins et
						de la Communauté de l'Anneau, le voyage pour détruire l'Anneau Unique et vaincre Sauron est
						rempli de dangers, de batailles grandioses et de moments de bravoure. Les paysages majestueux de
						la Terre du Milieu, les personnages inoubliables et la profondeur de l'histoire font de cette
						trilogie un classique du cinéma d'aventure et de fantasy
					</div>
					<div class="buttons">
						<button>VOIR</button>
						<button>RESERVER</button>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="image/Challengers.jpg">
				<div class="contents">
					<div class="title">NOUVEAUTE</div>
					<div class="topic">CHALLENGE</div>
					<div class="des">
						"Le Voyage de Chihiro" de Hayao Miyazaki, les spectateurs sont entraînés dans un monde onirique
						rempli de mystères et de merveilles. L'histoire de Chihiro, une jeune fille qui se retrouve
						piégée dans un monde de créatures fantastiques, explore des thèmes tels que la courage,
						l'acceptation du changement et la compassion. Avec son animation magnifique et sa narration
						envoûtante, ce film d'animation japonais est devenu un chef-d'œuvre acclamé par la critique et
						aimé par les spectateurs du monde entier.
					</div>
					<div class="buttons">
						<button>VOIR</button>
						<button>RESERVER</button>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="image/banniere4.jpg">
				<div class="contents">
					<div class="title">BOUUM</div>
					<div class="topic">OPPENHEIMER</div>
					<div class="des">
						Dans "Interstellar", dirigé par Christopher Nolan, l'humanité est confrontée à son destin dans
						un futur où la Terre est sur le point de devenir inhabitable. Avec des théories scientifiques
						complexes et des enjeux émotionnels poignants, le film explore les frontières de l'espace et du
						temps, offrant une expérience cinématographique captivante qui pousse les spectateurs à
						réfléchir sur notre place dans l'univers et les sacrifices nécessaires pour assurer la survie de
						l'espèce humaine
					</div>
					<div class="buttons">
						<button>VOIR</button>
						<button>RESERVER</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Vignette -->
		<div class="thumbnail">
			<div class="item">
				<img src="image/banniere1.jpg">
				<div class="contents">
					<div class="title">
						Dc Comics
					</div>
					<div class="description">

					</div>
				</div>
			</div>
			<div class="item">
				<img src="image/anneau.jpg">
				<div class="contents">
					<div class="title">
						Le seigneur des anneaux
					</div>
					<div class="description">

					</div>
				</div>
			</div>
			<div class="item">
				<img src="image/banniere3.jpg">
				<div class="contents">
					<div class="title">
						Challenge
					</div>
					<div class="description">

					</div>
				</div>
			</div>
			<div class="item">
				<img src="image/banniere4.jpg">
				<div class="contents">
					<div class="title">
						Oppenheimer
					</div>
					<div class="description">

					</div>
				</div>
			</div>
		</div>
		<!-- next prev -->

		<div class="arrows">
			<button id="prev">
				<< /button>
					<button id="next">></button>
		</div>
		<!-- time running -->
		<div class="time"></div>
	</div>

	<section>
		<h1>A l'affiche</h1>
		<div>
			<select id="categories">
				<option value="Populaire">Populaire</option>
				<option value="Tout public">Tout public</option>
				<option value="Senior">Senior</option>
			</select>
		</div>
		<div class="affiches">
			<a href="page/Nosfilms.php?id=1" class="affiche" data-category="Populaire">
				<img src="image/affiche.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=2" class="affiche" data-category="Senior">
				<img src="image/Ch'tis.jpg" alt="Nom du Film" class="poster">
				<button class="seance" type="button" name="id">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=3" class="affiche" data-category="Populaire">
				<img src="image/dune.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=4" class="affiche" data-category="Populaire">
				<img src="image/photoopp.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=5" class="affiche" data-category="Populaire">
				<img src="image/banniere3.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=6" class="affiche" data-category="Populaire">
				<img src="image/pana.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=7" class="affiche" data-category="Populaire">
				<img src="image/tenet.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=8" class="affiche" data-category="Populaire">
				<img src="image/hasbi.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=9" class="affiche" data-category="Populaire">
				<img src="image/avat.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=10" class="affiche" data-category="Populaire">
				<img src="image/int.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
			<a href="page/Nosfilms.php?id=11" class="affiche" data-category="Populaire">
				<img src="image/glad.jpg" alt="" class="poster">
				<button class="seance" type="button">séances</button>
			</a>
		</div>
	</section>



	<section>
		<h1>Evenements</h1>

		<div class="evenement">
			<a href="#" class="evenement">
				<img src="image/affiche.jpg" alt="" class="evenement-image">
			</a>
			<a href="#" class="evenement">
				<img src="image/comedie.jpg" alt="" class="evenement-image">
			</a>
		</div>


		<div class="popup-overlay">
			<div class="popup">
				<span class="popup-text">Description de l'événement</span>
				<span id="places-disponibles" class="places-disponibles">20 places disponibles</span>
				<button class="reserve-btn" type="button" id="reserve-button">Réserver</button>
				<button class="reserve-btn" type="button" id="popup-close"> Retour</button>

			</div>
		</div>


		<script src="evenement.js"></script>




	</section>


	<div class="footer">
		<div class="icone">
			<p>Retrouvez nous sur:</p>
			<a href=""><i class="fa-brands fa-facebook"></i></a>
			<a href=""><i class="fa-brands fa-instagram"></i></a>
			<a href=""><i class="fa-brands fa-twitter"></i></a>
			<a href=""><i class="fa-brands fa-telegram"></i></a>
		</div>
		<div class="Info">
			<div class="Info1">Nom du cinema</div>
			<div class="Info2">Adresse</div>
			<div class="Info3">Numero de telephone</div>
		</div>
		<div class="naviguation">

			<ul>

				<li><a href="page/contact.php">Contact</a></li>
				<li><a href="page/cgu.php">CGU</a></li>
				<li><a href="page/mentionslegales.php">Mentions legales</a></li>
				<li><a href="#">Forum</a></li>

			</ul>



		</div>



	</div>

	<div class="image">

		<img src="image/footer.png" alt="footer image" class="footer_ima">
	</div>
	<script src="app.js"></script>
	<script src="affiche.js"></script>
</body>

</html>