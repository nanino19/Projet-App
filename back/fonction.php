<?php include('pdo.php');

/**
 *      PAGE INSCRIPTION
 */

function insererUtilisateur($email, $motDePasse, $nom, $prenom, $telephone)
{
    if (checkIfUserExist($email) == null) {
        try {
            $pdo = connectBdd();

            // Requête SQL pour insérer un nouvel utilisateur
            $requete = "INSERT INTO utilisateur (email, password, nom, prenom, telephone) VALUES (:email, :motDePasse, :nom, :prenom, :telephone)";

            // Préparation de la requête
            $statement = $pdo->prepare($requete);

            // cryptage mot de passe = 
            $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);

            // Liaison des paramètres de la requête
            $statement->bindParam(':email', $email);
            $statement->bindParam(':motDePasse', $motDePasse);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':prenom', $prenom);
            $statement->bindParam(':telephone', $telephone);

            // Exécution de la requête
            $statement->execute();

            // Fermeture de la connexion à la base de données
            $pdo = null;

            // Retourne true si l'insertion a réussi
            return true;
        } catch (PDOException $e) {
            // En cas d'erreur, afficher l'erreur
            echo "Erreur d'insertion dans la base de données : " . $e->getMessage();
            // Retourne false en cas d'erreur
            return false;
        }
    }
    return false;
}

/**
 *      PAGE CONNEXION
 */

function checkIfUserExist($email)
{
    try {
        // Connexion à la base de données
        $pdo = connectBdd(); // Assurez-vous que cette fonction retourne bien une instance de PDO

        // Requête SQL préparée pour vérifier l'existence d'un utilisateur avec l'email spécifié
        $requete = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $requete->execute([':email' => $email]); // Utilisation de la liaison de paramètres pour éviter les injections SQL
        $user = $requete->fetch();
        // Vérification si au moins un utilisateur existe avec cet email
        if ($requete->rowCount() > 0) {
            return $user; // Un utilisateur existe déjà avec cet email
        } else {
            return null; // Aucun utilisateur trouvé avec cet email
        }
    } catch (PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur dans la base de données : " . $e->getMessage();
        return null; // Retourne false en cas d'erreur
    }
}

/*
    PAGE NOS FILMS
*/

function getAllFilms()
{
    try {
        $pdo = connectBdd();
        // La requête SQL
        $sql = "SELECT * FROM film f join seance s on f.id = s.idfilm join salle sa on sa.id = s.idsalle";

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

function getOnlyFilms()
{
    try {
        $pdo = connectBdd();
        // La requête SQL
        $sql = "SELECT * FROM film";

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

/*
    PAGE DETAILS FILM
*/
function getAllSeanceByFilm($idFilm)
{
    try {
        // Connexion à la base de données
        $pdo = connectBdd();

        // La requête SQL avec une requête paramétrée pour éviter les injections SQL
        $sql = "SELECT s.id as seance_id, s.idsalle, s.version, s.horaire, s.date, 
                       f.id as film_id, f.titre, f.description, f.datedesortie, f.duree, f.image, f.video, f.note 
                FROM seance s 
                JOIN film f ON s.idfilm = f.id 
                WHERE s.idfilm = :idFilm 
                ORDER BY s.date";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Exécution de la requête avec le paramètre
        $stmt->execute(['idFilm' => $idFilm]);

        // Initialisation des résultats
        $filmInfo = null;
        $seances = [];

        // Récupération des résultats
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($filmInfo === null) {
                // On stocke les informations du film (une seule fois)
                $filmInfo = [
                    'id' => $row['film_id'],
                    'titre' => $row['titre'],
                    'description' => $row['description'],
                    'datedesortie' => $row['datedesortie'],
                    'duree' => $row['duree'],
                    'image' => $row['image'],
                    'video' => $row['video'],
                    'note' => $row['note']
                ];
            }

            // On stocke les informations de chaque séance
            $seances[] = [
                'id' => $row['seance_id'],
                'idsalle' => $row['idsalle'],
                'version' => $row['version'],
                'horaire' => $row['horaire'],
                'date' => $row['date']
            ];
        }

        // On retourne un tableau structuré avec les infos du film et les séances
        return [
            'film' => $filmInfo,
            'seances' => $seances
        ];
    } catch (Exception $e) {
        echo "Erreur: " . $e->getMessage();
        return null;
    }
}