<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>
<div class="contact-form">
    <h2>Contactez-nous</h2>
    <form action="submit.php" method="POST">
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