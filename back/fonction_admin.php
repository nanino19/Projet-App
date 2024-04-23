<?php include('pdo.php');

function insererUnFilm($imageTmpName, $uploadFile, $titre, $description, $dateDeSortie, $duree, $video, $imageName, $note)
{
    // Si les validations passent, procéder à l'insertion dans la base de données
    try {
        $pdo = connectBdd();
        // Déplacer l'image uploadée dans le dossier souhaité
        if (move_uploaded_file($imageTmpName, $uploadFile)) {
            // Créer la requête SQL
            $query = "INSERT INTO film (titre, description, datedesortie, duree,image, video,  note) VALUES (:titre, :description, :dateDeSortie, :duree, :imageName, :video, :note)";
            $stmt = $pdo->prepare($query);

            // Lier les paramètres
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':dateDeSortie', $dateDeSortie);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':imageName', $imageName);
            $stmt->bindParam(':video', $video);
            $stmt->bindParam(':note', $note);

            // Exécuter la requête
            if ($stmt->execute()) {
                $response = [
                    'status' => 'success',
                    'message' => 'Le film a été ajouté avec succès'
                ];
            }
        }
    } catch (Exception $e) {
        // Gérer les erreurs d'exécution
        $response['message'] = $e->getMessage();
    }
    return $response;
}