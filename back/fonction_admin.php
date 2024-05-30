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

function insererUneSeance($idFilm, $idSalle, $date, $horaire, $version)
{
    try {
        $pdo = connectBdd();
        // Préparez une requête SQL en utilisant des placeholders
        $query = "INSERT INTO seance (idfilm, idsalle, version, horaire, date) VALUES (:idfilm, :idsalle, :version, :horaire, :date)";
        $stmt = $pdo->prepare($query);

        // Liez les paramètres à la requête préparée
        $stmt->bindParam(':idfilm', $idFilm);
        $stmt->bindParam(':idsalle', $idSalle);  // Assurez-vous de spécifier le type de données si ce n'est pas une chaîne
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':horaire', $horaire);
        $stmt->bindParam(':date', $date);

        // Exécuter la requête
        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'La seance a été ajoutée avec succès'
            ];
        } else {
            // Gestion des erreurs en cas d'échec de l'exécution
            $response = [
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de lajout de la seance'
            ];
        }
    } catch (Exception $e) {
        // Gérer les erreurs d'exécution
        $response['message'] = $e->getMessage();
    }
    return $response;
}

function getAllFilms()
{
    try {
        $pdo = connectBdd();
        $sql = "SELECT id,titre FROM film f";

        // Exécution de la requête
        $stmt = $pdo->query($sql);
        $results = [];
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
        return $results;
    } catch (PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur dans la base de données : " . $e->getMessage();
        return null; // Retourne false en cas d'erreur
    }
}

function getAllSalles()
{
    try {
        $pdo = connectBdd();
        // La requête SQL
        $sql = "SELECT id, nom FROM salle";

        // Exécution de la requête
        $stmt = $pdo->query($sql);
        $results = [];
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
        return $results;
    } catch (PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur dans la base de données : " . $e->getMessage();
        return null; // Retourne false en cas d'erreur
    }
}