<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
	include("aside-admin.php");
}
echo '
<div class= "header">
	<a href="../index.php">
	<img src="../image/logo.png" alt="Logo" class="logo" >
	</a>
	<nav>
		<ul class="menu">
			<li><a href="../page/Nousdecouvrir.php">Nous decouvrir</a></li>
			<li><a href="../page/Nosfilms.php">Films</a></li>
<<<<<<< Updated upstream
			<li><a href="../page/faq.php">Forum</a></li>
			<li><a href="../page/connexion.php">Mon Compte</a></li>
			<li><a href="../page/inscription.php">Creer un Compte</a></li>
=======
			<li><a href="../page/faq.php">Forum</a></li>';
			if(isset($_SESSION['user'])) {
				echo'<li><a href="../page/profil.php">'.
				 htmlspecialchars($_SESSION['user']['prenom']) . ' ' . htmlspecialchars($_SESSION['user']['nom']).'</a></li>
				<li><a href="../back/logout.php">Deconnexion</a></li>';
			} else {
				echo '
				<li><a href="../page/inscription.php">Creer un Compte</a></li>
				<li><a href="../page/connexion.php">Se connecter</a></li>';
			}
			echo'
>>>>>>> Stashed changes
		</ul>
	</nav>
</div>';
?>
