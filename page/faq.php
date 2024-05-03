
<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>





<div class="bodyfaq">
<div class="intro">
    Besoin d'aide ?     
</div>



<div class="faq-container">

    <div class="sidebar">
        <!-- Nouvelles questions -->
        <div class="question">
            <h2>À quelle heure ouvrent les portes du cinéma ?</h2>
            <div class="answer">
                <p>Les portes du cinéma ouvrent généralement 30 minutes avant la première séance du jour. Veuillez consulter notre programme pour connaître les horaires spécifiques.</p>
            </div>
        </div>
        <div class="question">
            <h2>Y a-t-il des réductions pour les étudiants ou les personnes âgées ?</h2>
            <div class="answer">
                <p>Oui, nous proposons des réductions pour les étudiants munis d'une carte étudiante valide et pour les personnes âgées de plus de 60 ans. </p>
            </div>
        </div>
        <div class="question">
            <h2>Est-ce que je peux acheter mes billets en ligne ?</h2>
            <div class="answer">
                <p> Oui, vous pouvez acheter vos billets en ligne sur notre site web ou via notre application mobile. </p>
            </div>
        </div>
    </div>

    <div class="contentFAQ">
        <!-- Questions existantes -->
        <div class="question">
            <h2>Puis-je annuler ou modifier ma réservation de billets ?</h2>
            <div class="answer">
                <p>Oui, vous pouvez annuler ou modifier votre réservation de billets en ligne jusqu'à 2 heures avant le début de la séance. </p>
            </div>
        </div>
        <div class="question">
            <h2>Y a-t-il un parking disponible près du cinéma ?</h2>
            <div class="answer">
                <p>Oui, nous disposons d'un parking gratuit pour les visiteurs du cinéma. Il est situé à proximité de l'entrée principale et offre un accès pratique aux cinéphiles.</p>
            </div>
        </div>
        <div class="question">
            <h2>Est-ce que le cinéma propose des séances en version originale (VO) ?</h2>
            <div class="answer">
                <p> Oui, nous proposons régulièrement des séances en version originale (VO) pour les amateurs de cinéma international.</p>
            </div>
        </div>
    </div>
</div>

<div class="espace">

</div>
</div>



<script>
    document.querySelectorAll('.question').forEach(item => {
        item.addEventListener('click', event => {
            const answer = item.querySelector('.answer');
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
    
</script>


<?php include('../composant/footer.php'); ?>

