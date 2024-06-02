<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>

<?php
// Lire le contenu du fichier cgu.txt
$cguFile = 'cgu.php';
$cguContent = file_exists($cguFile) ? file_get_contents($cguFile) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traiter les modifications du texte des CGU
    $newCguContent = $_POST['cguContent'];
    file_put_contents($cguFile, $newCguContent);
    echo "<script>alert('Les CGU ont été mises à jour avec succès.');</script>";
    $cguContent = $newCguContent;
}
?>


    <h4>Modifier les Conditions Générales d'Utilisation</h4>

    <form method="POST" action="modifier_cgu.php">
        <textarea name="cguContent" rows="20" cols="100"><?= htmlspecialchars($cguContent) ?></textarea><br>
        <button type="submit">Enregistrer</button>
    </form>


<?php include('../composant/footer.php'); ?>
