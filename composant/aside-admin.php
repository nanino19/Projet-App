<?php
echo'<aside id="admin-sidebar">
  <div class="admin-profile">
    <img src="admin-avatar.png" alt="Admin Avatar" class="admin-avatar">
    <h3>Nom de l\'Admin</h3>
    <button id="sidebarToggle" class="sidebar-toggle">
      <span class="sidebar-arrow"></span>
    </button>
  </div>
  <nav class="admin-navigation">
    <ul>
      <li><a href="#">Tableau de bord</a></li>
      <li><a href="../page/ajoutfilm.php">Ajouter un nouveau film</a></li>
      <li><a href="#">Utilisateurs</a></li>
      <li><a href="#">Commentaires</a></li>
      <li><a href="#">Paramètres</a></li>
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