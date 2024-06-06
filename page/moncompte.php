<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>
<?php
if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) {
    echo '<script>
        window.onload = function() {
            var errors = "' . $_SESSION['errors_subscribe'] . '";
            var errorArray = errors.split("<br>");
            errorArray.forEach(function(error) {
                if (error.trim() != "") {
                    alert(error);
                }
            });
        }
    </script>';
    unset($_SESSION['errors_subscribe']); // Nettoyer les erreurs de la session après les avoir affichées
}

// Afficher le message de succès si l'inscription a réussi
if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") {
    echo '<script>
        window.onload = function() {
            alert("Inscription validée!");
        }
    </script>';
}
function validatePassword($password) {
  if (strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[^a-zA-Z0-9]#", $password)) {
      return false; // Retourne false si le mot de passe ne respecte pas les critères
  }
  return true;
}

// Vérification si l'email est valide
function validateEmail($email) {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false; // Retourne false si l'email n'est pas valide
  }   
  return true;
}
?>

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
  <form method="POST" action="../back/inscription.php" id="form-inscription" onsubmit="return validateForm()">
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
    function validateForm() {
        var password = document.getElementsByName('pwd1')[0].value;
        var confirmPassword = document.getElementsByName('pwd2')[0].value;
        var email = document.getElementsByName('email')[0].value;

        if (password !== confirmPassword) {
            alert('Les mots de passe ne correspondent pas.');
            return false;
        }

        if (password.length < 8 || !password.match(/[0-9]/) || !password.match(/[^a-zA-Z0-9]/)) {
            alert('Le mot de passe doit contenir au moins 8 caractères avec au moins un chiffre et un caractère spécial.');
            return false;
        }

        if (!validateEmail(email)) {
            alert('L\'adresse e-mail n\'est pas valide.');
            return false;
        }

        return true;
    }

    function validateEmail(email) {
        var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }
</script>

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