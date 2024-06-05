<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>
<body>
<div class="blog">
    <div class="blog-heading">
        <h2>Cinemanager</h2>
        <h3>Le cinéma soucieux de votre santé</h3>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="../image/logo.png" alt="Logo">
            </div>
            <div class="about-content">
                <h3>Notre mission</h3>
                <p>Notre objectif est de révolutionner l'expérience sonore dans l'industrie du cinéma en proposant à nos associés  
                    un prototype de capteur sonore qui récupèrera des données dans les salles de cinéma afin de suivre en tant réel 
                    l'évolution du son et d'être certain de respecter les normes sonores</p>
                <div class="button" onclick="afficherTexte('texteSupplementaire1')">
                    Voir moins
                </div>
                <div id="texteSupplementaire1" class="additional-text">
                    <p>Ce capteur sonore, fruit de nombreuses recherches et développements, est capable de mesurer et d'analyser divers 
                        paramètres acoustiques essentiels tels que la fréquence, l'intensité, et la clarté du son. Grâce à sa capacité à 
                        communiquer les données collectées instantanément à une plateforme centrale, nos partenaires peuvent suivre en temps 
                        réel l'évolution sonore de chaque projection.</p>
                    <!-- Additional content -->
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="../image/MAGIK_LOGO2.png" alt="MAGIK LOGO">
            </div>
            <div class="about-content">
                <h3>Notre histoire</h3>
                <p>Nous sommes Magik System, une start-up composée d'une équipe dynamique de 7 ingénieurs tout juste diplômés 
                    de l’ISEP, école d'ingénieur du numérique. Notre entreprise propose des solutions technologiques innovantes 
                    ayant pour objectif d’améliorer de manière directe ou indirecte l'expérience sonore des consommateurs en fonction 
                    de l’environnement.</p>
                <div class="button" onclick="afficherTexte('texteSupplementaire2')">
                    Voir moins
                </div>
                <div id="texteSupplementaire2" class="additional-text">
                    <p>Events-IT est une entreprise spécialisée dans l'organisation d'événements et souhaite promouvoir la qualité 
                        sonore lors de leurs événements. Elle a récemment effectué un appel d’offres auquel Magik System a répondu 
                        favorablement en présentant une solution technologique innovante que nous allons vous présenter.</p>
                    <!-- Additional content -->
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="../image/Capture d'écran 2024-01-20 124113.png" alt="Solution Technique">
            </div>
            <div class="about-content">
                <h3>Notre solution technique</h3>
                <p>Nous sommes fiers de présenter notre prototype révolutionnaire, le "Capteur Sonore Autonome". 
                    Ce capteur est conçu pour mesurer divers paramètres sonores essentiels, tels que la fréquence du son perçu,
                    la puissance sonore et la durée. De plus, il dispose de fonctionnalités avancées, notamment la possibilité 
                    d'envoyer les données du son prélevé de manière sécurisée vers un serveur central via une connexion Bluetooth.</p>
                <div class="button" onclick="afficherTexte('texteSupplementaire3')">
                    Voir moins
                </div>
                <div id="texteSupplementaire3" class="additional-text">
                    <p>Dès lors que le traitement du signal sonore est effectué par notre capteur, celui-ci peut détecter les 
                        situations où la fréquence sonore dépasse le seuil d'audibilité dans un film destiné, cet effet peut causer 
                        des douleurs notamment pour les personnes atteintes de sensibilité auditive aux seniors. Dans ce cas, 
                        une alerte est automatiquement envoyée aux techniciens ce qui lui permettra ainsi de réagir efficacement sur 
                        la qualité sonore de la séance en réduisant les aigus en augmentant durant l’espace de quelques minutes la puissance 
                        sonore. Et le tout en temps réel permettant ainsi d’améliorer efficacement l'expérience auditive des spectateurs 
                        présents dans la salle.</p>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="../image/web solution.webp" alt="Web Solution">
            </div>
            <div class="about-content">
                <h3>Notre solution web</h3>
                <p>Un site web dynamique et accessible à tous les utilisateurs.</p>
                <div class="button" onclick="afficherTexte('texteSupplementaire4')">
                    Voir moins
                </div>
                <div id="texteSupplementaire4" class="additional-text">
                    <p>Espaces utilisateurs personnalisés : L’utilisateur aura le choix entre deux espaces utilisateurs, client 
                        et administrateur, qui sera à préciser lors de l’inscription sur le site. Les utilisateurs clients pourront 
                        alors bénéficier d'un compte leur permettant de réserver des séances et des places sans paiement, tout en 
                        ayant accès à des informations précieuses concernant l'audibilité des films à l'affiche. Les administrateurs, 
                        de leur côté, ont la possibilité d’effectuer des modifications sur la vitrine.</p>
                    <!-- Additional content -->
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function afficherTexte(id) {
        var texteSupp = document.getElementById(id);
        if (texteSupp.style.display === "none" || texteSupp.style.display === "") {
            texteSupp.style.display = "block";
        } else {
            texteSupp.style.display = "none";
        }
    }
</script>
<?php include ('../composant/footer.php'); ?>
</body>
</html>
