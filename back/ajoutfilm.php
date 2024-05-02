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
    // Récupérer les données du formulaire
    $titre = $_POST['titre'] ?? '';
    $description = $_POST['description'] ?? '';
    $dateDeSortie = $_POST['datedesortie'] ?? '';
    $duree = $_POST['duree'] ?? '';
    $video = $_POST['video'] ?? '';
    $note = $_POST['note'] ?? '';

    // Gérer l'upload de l'image
    print_r($_FILES['image']);
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $uploadDir = '../uploads/';
    $uploadFile = $uploadDir . basename($imageName);

    // Valider les données (à compléter selon les règles de validation que vous souhaitez appliquer)
    $response = insererUnFilm($imageTmpName, $uploadFile, $titre, $description, $dateDeSortie, $duree, $video, $imageName, $note);
}
if ($response['status'] == 'success') {
    header('Location: ../page/Nosfilms.php?msg=add_film_success'); // REDIRECTION
    exit();
} else {
    $_SESSION['add_film_error'] = $response['message'];
    header('Location: ../page/ajoutfilm.php?msg=add_film_error'); // REDIRECTION
    exit();
}