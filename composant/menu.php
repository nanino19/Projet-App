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
			<li><a href="../page/films_affiche.php">Films</a></li>
			<li><a href="../page/faq.php">Forum</a></li>
			<li><a href="../page/connexion.php">Mon Compte</a></li>
			<li><a href="../page/inscription.php">Creer un Compte</a></li>
		</ul>
	</nav>
</div>';
?>
