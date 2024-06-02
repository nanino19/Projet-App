<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cinemanager</title>
    <link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
	session_start();
        include ("back/pdo.php"); // Inclure le fichier pdo.php pour obtenir la connexion PDO
        
        // Rediriger les messages d'erreur vers le journal des erreurs du serveur
        ini_set('log_errors', 1);
        ini_set('error_log', 'php_errors.log');

        if (isset($_GET['msg']) && $_GET['msg'] == "login_success" && isset($_SESSION["user"])) {
            // Your code for login success
        }

        // Vérifiez si il y a des messages d'erreur stockés dans la session
        if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION["login_error"] . '</div>';
            unset($_SESSION['login_error']); // Nettoyer les erreurs de la session après les avoir affichées
        }

        // Code correspondant à la requête BDD pour la barre de recherche
        @$keywords = $_GET["keywords"];
        @$valider = $_GET["valider"];
        if (isset($valider) && !empty(trim($keywords))) {
            $words = explode(" ", trim($keywords));
            for ($i = 0; $i < count($words); $i++)
                $kw[$i] = "titre like '%" . $words[$i] . "%' ";
            $pdo = connectBdd(); // Appeler la fonction connectBdd() pour obtenir la connexion PDO
            if ($pdo) { // Vérification de la connexion à la base de données
                $res = $pdo->prepare("select titre from film where " . implode(" OR ", $kw)); // Lorsqu'on met plusieurs mots dans la barre de recherche, c'est pris en compte
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
        <a href="index.php">
            <img src="image/logo.png" alt="Logo" class="logo">
        </a>
        <div class="header-center">
            <form action="#" method="get">
                <input type="search" name="search" placeholder="Rechercher...">
            </form>
            <nav class="menu">
                <ul>
                    <li><a href="page/Nousdecouvrir.php">Nous decouvrir</a></li>
                    <li><a href="page/Films.php">Films</a></li>
                    <li><a href="page/forum.php">Forum</a></li>
					<li><a href="page/fa.php">FAQ</a></li>
                    
                </ul>
            </nav>
        </div>
        <div class="header-right">
    <?php if (isset($_SESSION['user'])): ?>
        <img src="https://phantom-marca.unidadeditorial.es/ddf06b72adb932ec625c2e07329527f0/crop/0x0/1059x706/resize/828/f/jpg/assets/multimedia/imagenes/2022/10/23/16665279627938.png" alt="Avatar" class="avatar">
        <?php 
            
            $nom = $_SESSION['user']['nom'];
            $prenom = $_SESSION['user']['prenom'];
        ?>
        <a href="page/profil.php" class="account-link"><?php echo htmlspecialchars($prenom . ' ' . $nom); ?></a>
    <?php else: ?>
        <a href="page/moncompte.php" class="account-link">Mon Compte</a>
        <img src="https://img.freepik.com/psd-gratuit/rendu-3d-du-personnage-avatar_23-2150611746.jpg?w=740&t=st=1714915486~exp=1714916086~hmac=d31e263488e13d3b206cf160c1c80dc48ad5bf8409b6a2680e87f5beeec36385" alt="Avatar" class="avatar">
    <?php endif; ?>
</div>

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
				< </button>
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
<?php
    
    $pdo = connectBdd(); 
    
    $requete = "SELECT * FROM film WHERE affiche IS NOT NULL"; 
	$donnee="SELECT * FROM film WHERE affiche = ?";// 1
    $resultat = $pdo->query($requete);
	

   
    if ($resultat->rowCount() > 0) {
		while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
			echo '<a href="page/Nosfilms.php?id=' . $row['id'] . '" class="affiche">';
			
			$imageData = base64_encode($row["affiche"]);
			
			echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="" class="poster">';
			echo '<button class="seance" type="button">séances</button>';
			echo '</a>';
		}
	} else {
		echo "Aucune affiche trouvée.";
	}
	

    
    $pdo = null;
?>
			
		</div>
	</section>


	<section class="activities-section">
    <h1>Activités</h1>
    <div class="activities-container">
        <div class="activity-card">
            <img src="https://www.kana.fr/wp-content/uploads/2022/10/azdedaa-1600x900.jpg?x80745" alt="Activity 1" class="activity-image">
            <div class="activity-info">
                <h2>Prochainement</h2>
                <p>Après le succès du NARUTO SYMPHONIC EXPERIENCE en France et en Europe, UN POUR TOUS PRODUCTIONS en collaboration avec MEDIATOON LICENSING présente : NARUTO SHIPPUDEN SYMPHONIC EXPERIENCE (Part I)

Venez découvrir la suite des aventures de NARUTO sur un écran géant accompagné d’un Orchestre exceptionnel !</p>
                <a class="activity-button" href="https://www.ledomedeparis.com/fr/spectacle/222/naruto-shippuden">En profiter</a>
            </div>
        </div>
        <div class="activity-card">
            <img src="image/hasbi.jpg" alt="Activity 2" class="activity-image">
            <div class="activity-info">
                <h2>A voir</h2>
                <p>hasbi le combattant de l'extreme</p>
                <a class="activity-button" href="https://www.youtube.com/watch?v=c9G36djAH88">Decouvrir</a>
            </div>
        </div>
        <div class="activity-card">
            <img src="https://cdn.sortiraparis.com/images/80/69688/1070315-fantasy-film-festival-le-festival-du-film-du-fantasme-2024-une-celebration-de-l-imaginaire.jpg" alt="Activity 3" class="activity-image">
            <div class="activity-info">
                <h2>A ne pas rater</h2>
                <p>Fantasy Film Festival – Le Festival du Film du Fantasme 2024 : une célébration de l'imaginaire</p>
                <a class="activity-button" href="https://fantasyfilmfestivalofficial.com/fr/">En profiter</a>
            </div>
        </div>
        <div class="activity-card">
            <img src="image/gab.jpg" alt="Activity 4" class="activity-image">
            <div class="activity-info">
                <h2>Bientôt</h2>
                <p>Venez découvrir gabriel pour un cours passionant de php</p>
                <a class="activity-button" href="https://www.php.net/manual/fr/intro-whatis.php">Decouvrir</a>
            </div>
        </div>
    </div>
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
			<div class="Info1">Hasbimovie</div>
			<div class="Info2">85 rue Jean metid</div>
			<div class="Info3">07 58 96 84 75</div>
		</div>
		<div class="naviguation">

			<ul>

				<li><a href="page/contact.php">Contact</a></li>
				<li><a href="page/cgu.php">CGU</a></li>
				<li><a href="page/mentionslegales.php">Mentions legales</a></li>
				<li><a href="page/faq.php">FAQ</a></li>

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