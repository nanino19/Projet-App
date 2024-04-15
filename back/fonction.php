<?php include('pdo.php'); 
function insererUtilisateur($email, $motDePasse, $nom, $prenom, $telephone) {
    try {
        $pdo= connectBdd();

        // Requête SQL pour insérer un nouvel utilisateur
        $requete = "INSERT INTO utilisateur (email, password, nom, prenom, telephone) VALUES (:email, :motDePasse, :nom, :prenom, :telephone)";
        
        // Préparation de la requête
        $statement = $pdo->prepare($requete);

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
    } catch(PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur d'insertion dans la base de données : " . $e->getMessage();
        // Retourne false en cas d'erreur
        return false;
    }
}
?>