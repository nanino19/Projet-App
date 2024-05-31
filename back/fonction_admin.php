<?php include('pdo.php');

function insererUnFilm($imageTmpName, $uploadFile, $titre, $description, $dateDeSortie, $duree, $realisateur, $imageName, $note)
{
    // Si les validations passent, procéder à l'insertion dans la base de données
    try {
        $pdo = connectBdd();
        // Déplacer l'image uploadée dans le dossier souhaité
        if (move_uploaded_file($imageTmpName, $uploadFile)) {
            // Créer la requête SQL
            $query = "INSERT INTO film (titre, description, datedesortie, duree,affiche, realisateur,  note) VALUES (:titre, :description, :dateDeSortie, :duree, :imageName, :realisateur, :note)";
            $stmt = $pdo->prepare($query);

            // Lier les paramètres
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':dateDeSortie', $dateDeSortie);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':imageName', $imageName);
            $stmt->bindParam(':realisateur', $realisateur);
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

function insererUneSalle($nom, $description, $nbplaces)
{
    try {
        $pdo = connectBdd();
        // Préparez une requête SQL en utilisant des placeholders
        $query = "INSERT INTO salle (nom, nbplaces, description) VALUES (:nom, :nbplaces, :description)";
        $stmt = $pdo->prepare($query);

        // Liez les paramètres à la requête préparée
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':nbplaces', $nbplaces, PDO::PARAM_INT);  // Assurez-vous de spécifier le type de données si ce n'est pas une chaîne
        $stmt->bindParam(':description', $description);

        // Exécuter la requête
        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'La salle a été ajoutée avec succès'
            ];
        } else {
            // Gestion des erreurs en cas d'échec de l'exécution
            $response = [
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de lajout de la salle'
            ];
        }
    } catch (Exception $e) {
        // Gérer les erreurs d'exécution
        $response['message'] = $e->getMessage();
    }
    return $response;
}


    
