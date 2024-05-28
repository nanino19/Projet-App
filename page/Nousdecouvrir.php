<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>
</div>
<div class="blog">
	<div class="blog-heading">
		<h2>Cinemanager</h2>
		<h3>Le cinéma souscieux de votre santé</h3>
	</div>	
</div>
<div class="wrapper">	
	<div class="wrapper2">
		<img src="../image/travail-de-groupe.webp">
		<div class="wrapper3">
			<h1> Venez nous découvrir </h1>
			<p> Hasbulla Magomedov</p>
		</div>
	</div>
</div>
<div class="container">
	<section class="about">
		<div class="about-image">
			<img src="../image/MAGIK_LOGO2.png">
		</div>
		<div class="about-content">
			<h3> Notre histoire</h3>
			<p> Nous sommes Magik System, une start-up composée d’une équipe dynamique de 7 ingénieurs de l’ISEP, 
				école d’ingénieur du numérique. Notre entreprise propose des solutions technologiques innovantes ayant 
				pour objectif d’améliorer de manière direct ou indirect l’expérience sonore des consommateurs en fonction 
				de l’environnement. </p>
				<div class="container">
        <div class="button" onclick="afficher_texte()">
            Read more
        </div>
        <span id="span_txt"></span>
    </div>

    <script>
    function afficher_texte() {
        var span = document.getElementById("span_txt");
        if(span.innerHTML !== "") {
            span.innerHTML = "";
        } else {
            span.innerHTML = "Nous sommes Magik System, une start-up composée d'une équipe dynamique de 7 ingénieurs de l'ISEP, école d'ingénieur du numérique. Notre entreprise propose des solutions technologiques innovantes ayant pour objectif d'améliorer de manière directe ou indirecte l'expérience sonore des consommateurs en fonction de l'environnement. Events-IT est une entreprise spécialisée dans l'organisation d'événements et souhaite promouvoir la qualité sonore au cours de leurs évènements. Elle a récemment effectué un appel d'offre auquel Magik System a répondu favorablement en présentant une solution technologique innovante que nous allons vous présenter. Nous sommes déterminés à transformer l'expérience sonore dans l'industrie du cinéma en proposant un système composé de deux éléments : un prototype de capteur sonore modulaire ayant la possibilité de communiquer des données sur une plateforme web dynamique et pratique à l'utilisateur. C'est pourquoi nous sommes ravis de travailler en étroite collaboration avec Events-IT. Nous pourrons ainsi proposer ce système innovant qui reflète notre objectif à long terme : garantir une qualité sonore exceptionnelle afin de pouvoir offrir aux spectateurs une tout nouvelle expérience cinématographique. Nous avons commencé la réalisation de notre projet par la conception de notre 'Capteur Sonore Autonome'. Ce capteur est conçu pour mesurer divers paramètres sonores essentiels, tels que la fréquence du son perçu, la puissance sonore et la durée. De plus, il dispose de fonctionnalités avancées, notamment la possibilité d'envoyer les données du son prélevé de manière sécurisée vers un serveur central via une connexion Bluetooth. Dès lors que le traitement du signal sonore est effectué par notre capteur, celui-ci peut détecter les situations où la fréquence sonore dépasse le seuil d'audibilité dans un film destiné, car cet effet peut causer des douleurs notamment pour les personnes atteintes de sensibilité auditive ou aux seniors. Le tout en temps réel permettant ainsi d'améliorer efficacement l'expérience auditive des spectateurs présents dans la salle.";
        }
    }
    </script>
		</div>
	</section>
</div>

<?php include('../composant/footer.php'); ?>