<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>




<div class="opening-hours">
    <p class="red-text">Nous Contacter</p>
</div>



<!-- Informations sur le contact -->
<div class="contact-info">
    <div class="info-box">
        <img src="https://i.pinimg.com/736x/40/72/fd/4072fd340ead74a58b57f3f4b1f7c871.jpg" alt="Logo Téléphone" class="logo">
        <h3>Numero de telephone</h3>
        <p>Du lundi au vendredi de 8h à 20h </p>
        <p>07 82 91 02 68</p>
    </div>

    <div class="info-box">
        <img src="../image/avatar.png" alt="Logo Email">
        <h3>Adresse Email</h3>
        <p>Nous vous répondrons dans les plus brefs délais</p>
        <p>Random@email.fr</p>
    </div>
    <div class="info-box">
        <img src="chemin/vers/votre/logo3.png" alt="Logo Cinéma">
        <h3>Dans votre cinema</h3>
        <p>Vous rencontrer sera toujours un plaisir</p>
        <p>28 Avenue De Marlioz</p>
    </div>
</div>

<!-- Phrase avec les horaires en rouge -->
<div class="opening-hours">
    <p class="red-text">Ouvert Tous les jours de 8h00 a 02h00</p>
</div>

<!-- Formulaire de contact -->
<div class="contact-form">
    <h2>Ecrivez-nous !</h2>
    <form action="../back/traitement_mail.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="col">
                <label for="subject" class="form-label">Sujet</label>
                <input type="text" id="subject" name="subject" class="form-control" required>
            </div>
            <div class="col">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
            </div>
            <div class="col">
                <button type="submit" class="btn-primary">Envoyer</button>
            </div>
        </div>
    </form>
</div>

<?php include ('../composant/footer.php'); ?>