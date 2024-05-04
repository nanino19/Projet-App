<?php
session_start();

echo '
<div class= "header">
	<a href="index.php">
	<img src="../image/logo.png" alt="Logo" class="logo" >
</a>
	<nav>
		<ul class="menu">
			<li><a href="../page/Nousdecouvrir.php">Nous decouvrir</a></li>
			<li><a href="../page/nosfilms.php">Films</a></li>
			<li><a href="../page/faq.php">Forum</a></li>
			<form>
				<input type="search" name="q" placeholder="Rechercher un film">
			</form>';
			if(isset($_SESSION['user'])) {
				echo'<li><a href="#">Mon Compte</a></li>';
				echo'<form action="../back/deconnexion.php"method="post">
					<li><button type="submit" name="logout">Se déconnecter</button></li>
					</form>';
			} else {
				echo '
				<li><a href="../page/inscription.php">Creer un Compte</a></li>
				<li><a href="../page/connexion.php">Se connecter</a></li>';
			}
			echo'
		</ul>
	</nav>
</div>';
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
	include("aside-admin.php");
}
?>