<?php
session_start(); 

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
    $realisateur = $_POST['realisateur'] ?? '';
    $note = $_POST['note'] ?? '';
    $categorie = $_POST['categorie'] ?? '';

    // Gérer l'upload de l'image
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];

    $imageContent = file_get_contents($imageTmpName);
    $imageContentBase64 = base64_encode($imageContent);

    // Valider les données (à compléter selon les règles de validation que vous souhaitez appliquer)
    $response = insererUnFilm($imageContentBase64, $titre, $description, $dateDeSortie, $duree, $realisateur, $imageName, $note, $categorie);
}

// Rediriger en fonction de la réponse
if ($response['status'] == 'success') {
    header('Location: ../page/Films.php?msg=add_film_success'); // REDIRECTION
    exit();
} else {
    $_SESSION['add_film_error'] = $response['message'];
    header('Location: ../page/ajoutfilm.php?msg=add_film_error'); // REDIRECTION
    exit();
}
?>
