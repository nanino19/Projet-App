<!DOCTYPE html>
<html>

<head>
 <link href="https://fonts.googleapis.com/css?family=Koulen" rel="stylesheet">
 
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
	<title>cinemanager</title>
	<meta charset="utf-8">
</head>

<body>
<?php
session_start();

include("back/pdo.php"); // Inclure le fichier pdo.php pour obtenir la connexion PDO

// Rediriger les messages d'erreur vers le journal des erreurs du serveur
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

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
        echo "<script>alert(decodeURIComponent('" .  $resultMessage . "'));</script>";
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
    <nav>
        <ul class="menu">
            <li><a href="page/Nousdecouvrir.php">Nous decouvrir </a></li>
            <li><a href="page/nosfilms.php">Films</a></li>
            <li><a href="page/faq.php">Forum</a></li>
            <form name="fo" method="get" action="">
    			<input type="search" id="searchInput" name="keywords" value="<?php echo $keywords ?>" placeholder="Rechercher un film">
    			<input type="submit" name="valider" value="Rechercher">
    			<button type="button" onclick="clearSearch()">X</button> <!-- Bouton pour effacer la recherche -->
			</form>
            <li><a href="page/connexion.php">Mon Compte</a></li>
            <li><a href="page/inscription.php">Creer un Compte</a></li>
        </ul>
    </nav>
</div> 





<!-- carousel -->
<div class="carousel">
	<!-- list item -->
	<div class="list">
		<div class="item">
			<img src="image/image1.webp">
			<div class="contents">
				<div class="title">DESIGN SLIDER</div>
				<div class="topic">ANIMAL</div>
				<div class="des">
					<!-- description -->
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
				</div>
				<div class="buttons">
					<button>VOIR</button>
					<button>RESERVER</button>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="image/image2.webp">
			<div class="contents">
				<div class="title">DESIGN SLIDER</div>
				<div class="topic">ANIMAL</div>
				<div class="des">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
				</div>
				<div class="buttons">
					<button>SEE MORE</button>
					<button>SUBSCRIBE</button>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="image/image3.webp">
			<div class="contents">
				<div class="title">DESIGN SLIDER</div>
				<div class="topic">ANIMAL</div>
				<div class="des">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
				</div>
				<div class="buttons">
					<button>SEE MORE</button>
					<button>SUBSCRIBE</button>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="image/image4.webp">
			<div class="contents">
				<div class="title">DESIGN SLIDER</div>
				<div class="topic">ANIMAL</div>
				<div class="des">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
				</div>
				<div class="buttons">
					<button>SEE MORE</button>
					<button>SUBSCRIBE</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Vignette -->
	<div class="thumbnail">
		<div class="item">
			<img src="image/image1.webp">
			<div class="contents">
				<div class="title">
					Name Slider
				</div>
				<div class="description">
					Description
				</div>
			</div>
		</div>
		<div class="item">
			<img src="image/image2.webp">
			<div class="contents">
				<div class="title">
					Name Slider
				</div>
				<div class="description">
					Description
				</div>
			</div>
		</div>
		<div class="item">
			<img src="image/image3.webp">
			<div class="contents">
				<div class="title">
					Name Slider
				</div>
				<div class="description">
					Description
				</div>
			</div>
		</div>
		<div class="item">
			<img src="image/image4.webp">
			<div class="contents">
				<div class="title">
					Name Slider
				</div>
				<div class="description">
					Description
				</div>
			</div>
		</div>
	</div>
	<!-- next prev -->

	<div class="arrows">
		<button id="prev"><</button>
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
		<a href="#" class="affiche" data-category="Populaire",>
			<img src="image/affiche.jpg" alt="" class="poster">
			<button class="seance" type="button">séances</button>
		</a>
		<a href="#" class="affiche" data-category="Senior">
			<img src="image/comedie.jpg" alt="" class="poster">
			<button class="seance" type="button">séances</button>
		</a>
		<a href="page/Nosfilms.php" class="affiche" data-category="Populaire">
			<img src="image/dune.jpg" alt="" class="poster">
			<button class="seance" type="button">séances</button>
		</a>
		
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>
		<a href="#" class="affiche"></a>


	</div>
</section>





<div class ="footer">
	<div class="icone">
		<p>Retrouvez nous sur:</p>
		<a href=""><i class="fa-brands fa-facebook"></i></a>
		<a href=""><i class="fa-brands fa-instagram"></i></a>
		<a href=""><i class="fa-brands fa-twitter"></i></a>
		<a href=""><i class="fa-brands fa-telegram"></i></a>
	</div>
	<div class="Info">
    <div class="Info1">Nom du cinéma</div>
	<div class="Info2">Adresse</div>
	<div class="Info3">Numéro de téléphone</div>
	</div>
	<div class="naviguation">
		
			<ul>
				
				<li><a href="page/contact.php">Contact</a></li>
				<li><a href="page/cgu.php">CGU</a></li>
				<li><a href="page/mentionslegales.php">Mentions légales</a></li>
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
