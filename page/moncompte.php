<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<div class="cozi">
  <h1>Mon compte</h1>
  <!-- Boutons pour basculer entre les formulaires -->
  <div class="row" style="display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
    <button type="button" class="btn btn-primary" id="btn-inscription">
      S'inscrire
    </button>
    <button type="button" class="btn btn-primary" id="btn-connexion">
      Se connecter
    </button>
  </div>
  <!-- Formulaire d'inscription par défaut -->
  <form method="POST" action="../back/inscription.php" id="form-inscription">
    <div class="row">
      <div class="col">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control">
      </div>
      <div class="col">
        <label for="nom" class="form-label">Prenom</label>
        <input type="text" name="prenom" class="form-control">
      </div>
      <div class="col">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="tel" name="tel" class="form-control" id="tel">
      </div>
      <div class="col">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="col">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="pwd1" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="col">
        <label for="exampleInputPassword1" class="form-label">Confirmer votre Password</label>
        <input type="password" name="pwd2" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="col">
        <input type="checkbox" name="conditionsG" id="conditionsGenerales" required class="custom-checkbox">
        <label for="conditionsGenerales" class="form-label custom-checkbox-label">J'ai lu et j'accepte les Conditions générales d'utilisation</label>
      </div>
    </div>
    <button type="submit" class="btn-primary">Inscription</button>
  </form>
  <!-- Formulaire de connexion caché par défaut -->
  <form method="POST" action="../back/connexion.php" id="form-connexion" style="display: none;">
    <div class="row">
      <div class="col">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="col">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control">
      </div>
      <button type="submit" class="btn-primary">Connexion</button>
    </div>
  </form>
</div>



<script>
  document.getElementById('btn-inscription').addEventListener('click', function() {
    document.getElementById('form-inscription').style.display = 'block';
    document.getElementById('form-connexion').style.display = 'none';
  });

  document.getElementById('btn-connexion').addEventListener('click', function() {
    document.getElementById('form-inscription').style.display = 'none';
    document.getElementById('form-connexion').style.display = 'block';
  });
</script>

<?php include ('../composant/footer.php'); ?>
