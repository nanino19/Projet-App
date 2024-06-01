<?php

if (isset($_SESSION['user'])) {
    $userName = $_SESSION['user']['prenom']; // Remplacez 'name' par le bon attribut pour le nom de l'utilisateur
} else {
    $userName = 'Admin'; // Valeur par défaut si l'utilisateur n'est pas connecté
}

echo '<aside id="admin-sidebar">
  <div class="admin-profile">
    <img src="../image/hasbi.jpg" alt="Admin Avatar" class="admin-avatar">
    <h3>' . htmlspecialchars($userName) . '</h3>
    <button id="sidebarToggle" class="sidebar-toggle">
      <span class="sidebar-arrow"></span>
    </button>
  </div>
  <nav class="admin-navigation">
    <ul>
      <li><a href="../page/tableau.php">Capacité salle</a></li>
      <li><a href="../page/ajoutfilm.php">Ajouter un nouveau film</a></li>
      <li><a href="../page/ajoutsalle.php">Ajouter une nouvelle salle</a></li>
      <li><a href="../page/ajoutseance.php">Ajouter une seance</a></li>
      <li><a href="../page/utilisateur.php">Utilisateurs</a></li>
      <li><a href="../page/forum.php">Forum</a></li>
      <li><a href="../page/faq.php">FAQ</a></li>
      <li><a href="../page/capteurs.php">Capteurs</a></li>
      <li><a href="#">Parametres</a></li>
    </ul>
  </nav>
</aside>';
?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var sidebar = document.getElementById('admin-sidebar');
    var toggleButton = document.getElementById('sidebarToggle');
    var arrow = toggleButton.querySelector('.sidebar-arrow');

    toggleButton.addEventListener('click', function() {
      // Basculer la classe collapsed sur le sidebar
      sidebar.classList.toggle('collapsed');
      
      // Changer la direction de la flèche
      if (sidebar.classList.contains('collapsed')) {
        arrow.classList.remove('arrow-left');
        arrow.classList.add('arrow-right');
        document.body.style.paddingLeft = '0'; // Rétracter le body
      } else {
        arrow.classList.remove('arrow-right');
        arrow.classList.add('arrow-left');
        document.body.style.paddingLeft = '240px'; // Étendre le body
      }
    });
  });
</script>
