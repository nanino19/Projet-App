<?php include('pdo.php');

function insererUnFilm($imageContent, $titre, $description, $dateDeSortie, $duree, $realisateur, $imageName, $note)
{
    // Si les validations passent, procéder à l'insertion dans la base de données
    try {
        $pdo = connectBdd();
        // Créer la requête SQL
        $query = "INSERT INTO film (titre, description, datedesortie, duree, affiche, realisateur, note) VALUES (:titre, :description, :dateDeSortie, :duree, :affiche, :realisateur, :note)";
        $stmt = $pdo->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':dateDeSortie', $dateDeSortie);
        $stmt->bindParam(':duree', $duree);
        $stmt->bindParam(':affiche', $imageContent, PDO::PARAM_LOB); // Utilisation du contenu de l'image
        $stmt->bindParam(':realisateur', $realisateur);
        $stmt->bindParam(':note', $note);

        // Exécuter la requête
        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'Le film a été ajouté avec succès'
            ];
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
function deleteUser($userId) {
    try {
        $pdo = connectBdd();
        $query = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}
function insererUneSeance($idFilm, $idSalle, $date, $horaire, $version, $nombrePlaces)
{
    try {
        $pdo = connectBdd();
        // Préparez une requête SQL en utilisant des placeholders
        $query = "INSERT INTO seance (id_film, idsalle, version, horaire, date, `nombre de places`) VALUES (:idfilm, :idsalle, :version, :horaire, :date, :nombrePlaces)";
        $stmt = $pdo->prepare($query);

        // Liez les paramètres à la requête préparée
        $stmt->bindParam(':idfilm', $idFilm);
        $stmt->bindParam(':idsalle', $idSalle);  // Assurez-vous de spécifier le type de données si ce n'est pas une chaîne
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':horaire', $horaire);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':nombrePlaces', $nombrePlaces); // Utilisez le bon nom ici

        // Exécuter la requête
        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'La séance a été ajoutée avec succès'
            ];
        } else {
            // Gestion des erreurs en cas d'échec de l'exécution
            $response = [
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de l\'ajout de la séance'
            ];
        }
    } catch (Exception $e) {
        // Gérer les erreurs d'exécution
        $response = [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
    }
    return $response;
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
