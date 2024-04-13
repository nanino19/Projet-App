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
<div class= "header">
	<a href="index.php">
	<img src="image/logo.png" alt="Logo" class="logo" >
</a>
	<nav>
		<ul class="menu">
			<li><a href="page/Nousdecouvrir.php">Nous decouvrir</a></li>
			<li><a href="page/Nosfilms.php">Films</a></li>
			<li><a href="page/calendrier.php">Calendrier</a></li>
			<li><a href="page/faq.php">Forum</a></li>
			<form>
			<input type="search" name="q" placeholder="Rechercher un film">
		</form>
			<li><a href="page/calendrier.php">Mon Compte</a></li>
		</ul>
	</nav>
</div>
<!-- carousel -->
<div class="carousel">
	<!-- list item -->
	<div class="list">
		<div class="item">
			<img src="image/image1.webp">
			<div class="content">
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
			<div class="content">
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
			<div class="content">
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
			<div class="content">
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
			<div class="content">
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
			<div class="content">
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
			<div class="content">
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
			<div class="content">
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
	<div class="affiches">
		<a href="#" class="affiche">
			<img src="image/affiche.jpg" alt="" class="poster">
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
				
				<li><a href="#">Contact</a></li>
				<li><a href="#">CGU</a></li>
				<li><a href="#">Mentions légales</a></li>
				<li><a href="#">Forum</a></li>
				
			</ul>
	</div>
</div>
<div class="image">
	<!--<p>Copyright copy;2024;Designed by <span class="deigner">Magik Systems</span></p>-->
	<img src="image/footer.png" alt="footer image" class="footer_ima">
</div>
<script src= "../app.js"></script>
</body>
</html>







