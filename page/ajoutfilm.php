<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<style>
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-container input[type="text"],
    .form-container input[type="date"],
    .form-container input[type="time"],
    .form-container input[type="file"],
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-container button {
        width: 100%;
        padding: 10px;
        background-color: #FBD314;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        border: none;
        border-radius: 4px;
        border: solid black 2px;
        cursor: pointer;
        font-size: 16px;
        margin: 0 auto; /* Center the button horizontally */
    }

    .form-container button:hover {
        background-color: red;
        color: black;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .rating-input {
        display: none;
    }

    .rating-star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .rating-input:checked ~ .rating-star,
    .rating-star:hover,
    .rating-star:hover ~ .rating-star {
        color: gold;
    }

    .alert {
        max-width: 600px;
        margin: 20px auto;
        padding: 15px;
        border-radius: 4px;
        color: #fff;
        text-align: center;
    }

    .alert-success {
        background-color: #4caf50;
    }

    .alert-danger {
        background-color: #f44336;
    }
</style>

<div class="form-container">
    <h2>Ajouter un Film</h2>
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == "subscribe_success") {
        echo '<div class="alert alert-success" role="alert">
          Inscription validée!
        </div>';
    }

    if (isset($_SESSION['errors_subscribe']) && !empty($_SESSION['errors_subscribe'])) {
        echo '<div class="alert alert-danger" role="alert">' .
            $_SESSION["errors_subscribe"] .
        '</div>';
        unset($_SESSION['errors_subscribe']);
    }
    ?>
    <form method="POST" action="../back/ajoutfilm.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control">
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="datedesortie" class="form-label">Date de sortie</label>
            <input type="date" id="start" name="datedesortie" class="form-control">
        </div>
        <div class="form-group">
            <label for="duree" class="form-label">Durée</label>
            <input type="time" id="duree" name="duree" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="realisateur" class="form-label">Réalisateur</label>
            <input type="text" name="realisateur" class="form-control" id="realisateur">
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="myImage" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="note" class="form-label">Note</label>
            <div class="rating">
                <input type="radio" id="star5" name="note" value="5" class="rating-input">
                <label for="star5" class="rating-star">&#9733;</label>
                <input type="radio" id="star4" name="note" value="4" class="rating-input">
                <label for="star4" class="rating-star">&#9733;</label>
                <input type="radio" id="star3" name="note" value="3" class="rating-input">
                <label for="star3" class="rating-star">&#9733;</label>
                <input type="radio" id="star2" name="note" value="2" class="rating-input">
                <label for="star2" class="rating-star">&#9733;</label>
                <input type="radio" id="star1" name="note" value="1" class="rating-input">
                <label for="star1" class="rating-star">&#9733;</label>
            </div>
        </div>
        <div class="form-group">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="categorie" class="form-control" id="categorie">
                <option value="Junior">Junior</option>
                <option value="Tout public">Tout public</option>
                <option value="Senior">Senior</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php include('../composant/footer.php'); ?>
