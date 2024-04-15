<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>
<div class="intro">
    Besoin d'aide ?
</div>
<div class="espace">

</div>

<div class="faq-container">

    <div class="sidebar">
        <!-- Nouvelles questions -->
        <div class="question">
            <h2>Question 1 : Qu'est-ce que PHP ?</h2>
            <div class="answer">
                <p>PHP (Hypertext Preprocessor) est un langage de script utilisé pour le développement d'applications Web côté serveur.</p>
            </div>
        </div>
        <div class="question">
            <h2>Question 3 : Qu'est-ce que MySQL ?</h2>
            <div class="answer">
                <p>MySQL est un système de gestion de base de données relationnelles open-source.</p>
            </div>
        </div>
        <div class="question">
            <h2>Question 5 : Qu'est-ce que jQuery ?</h2>
            <div class="answer">
                <p>jQuery est une bibliothèque JavaScript qui simplifie l'interaction avec le document HTML, l'animation, la manipulation des événements et AJAX.</p>
            </div>
        </div>
    </div>

    <div class="contentFAQ">
        <!-- Questions existantes -->
        <div class="question">
            <h2>Question 2 : Qu'est-ce que HTML ?</h2>
            <div class="answer">
                <p>HTML (HyperText Markup Language) est le langage de balisage standard utilisé pour créer et concevoir des pages Web.</p>
            </div>
        </div>
        <div class="question">
            <h2>Question 4 : Qu'est-ce que CSS ?</h2>
            <div class="answer">
                <p>CSS (Cascading Style Sheets) est un langage de feuille de style utilisé pour décrire la présentation d'un document HTML.</p>
            </div>
        </div>
        <div class="question">
            <h2>Question 6 : Qu'est-ce que Java ?</h2>
            <div class="answer">
                <p>JavaScript est un langage de programmation de scripts principalement utilisé dans les pages Web interactives.</p>
            </div>
        </div>
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