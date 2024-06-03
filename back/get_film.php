<?php
include("fonction_admin.php");

if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
    try {
        $pdo = connectBdd();
        $query = "SELECT * FROM film WHERE categorie = :categorie AND affiche IS NOT NULL";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<a href="page/Nosfilms.php?id=' . $row['id'] . '" class="affiche">';
                $imageData = base64_encode($row["affiche"]);
                echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="" class="poster">';
                echo '<button class="seance" type="button">séances</button>';
                echo '</a>';
            }
        } else {
            echo "<p>Aucun film trouvé dans la catégorie '$categorie'.</p>";
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
