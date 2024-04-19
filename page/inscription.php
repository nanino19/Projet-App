<?php include ('../composant/header.php'); ?>
<?php include ('../composant/menu.php'); ?>

<body id="Inscription" class="custom-background">


<form method="POST" action="../back/inscription.php">
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
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Well never share your email with anyone else.</div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pwd1" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Confirmer votre Password</label>
            <input type="password" name="pwd2" class="form-control" id="exampleInputPassword1">
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
<?php include ('../composant/footer.php'); ?>