<?php
session_start(); // Assurez-vous que cette ligne est au début du fichier, avant tout envoi de contenu

include("fonction_admin.php");



// Initialiser une réponse
$response = [
    'status' => 'error',
    'message' => 'Une erreur est survenue lors de l\'ajout du film'
];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFilm = $_POST['film'];
    $idSalle = $_POST['salle'];
    $date = $_POST['date'];
    $horaire = $_POST['horaire'];
    $version = $_POST['version'];

    // Valider les données (à compléter selon les règles de validation que vous souhaitez appliquer)
    $response = insererUneSeance($idFilm, $idSalle, $date, $horaire, $version);
    print_r($response);
}
if ($response['status'] == 'success') {
    header('Location: ../page/Nosfilms.php?msg=add_film_success'); // REDIRECTION
    exit();
} else {
    $_SESSION['add_film_error'] = $response['message'];
    echo($response['message']);
    exit();
}