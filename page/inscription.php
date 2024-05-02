<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<?php

if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") {
    echo '<script>alert("Inscription validée!");</script>';
}
// Vérification de la longueur du mot de passe et de sa composition
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

// Vérifiez si il y a des messages d'erreur stockés dans la session
if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) {
    echo '<div class="alert alert-danger" role="alert">' .
        $_SESSION["errors_subscribe"]; // Afficher les erreurs.
    '</div>';
    unset($_SESSION['errors_subscribe']); // Nettoyer les erreurs de la session après les avoir affichées
}

// Vérification si l'email est déjà utilisé
if (isset($_GET['msg']) && $_GET['msg'] == "email_used") {
    echo '<div class="alert alert-danger" role="alert">
      L\'adresse e-mail est déjà utilisée!
    </div>';
}

?>

<div class="cozi">
    <form method="POST" action="../back/inscription.php" onsubmit="return validateForm()">
        <div class="row">
            <div class="col">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="col">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control">
            </div>
            <div class="col">
                <label for="tel" class="form-label">Telephone</label>
                <input type="tel" name="tel" class="form-control" id="tel">
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="col">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pwd1" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col">
                <label for="exampleInputPassword2" class="form-label">Confirmer votre Password</label>
                <input type="password" name="pwd2" class="form-control" id="exampleInputPassword2">
            </div>
            <div class="col">
                <label for="conditionsGenerales" class="form-label">J'ai lu et j'accepte les Conditions générales d'utilisation</label>
                <input type="checkbox" name="conditionsG" id="conditionsGenerales" required>
            </div>

            <button type="submit" class="btn btn-primary">Inscription</button>
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
            return false;
        }

        return true;
        
    }
</script>

<?php include ('../composant/footer.php'); ?>
