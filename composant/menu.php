<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
    include("aside-admin.php");
}
?>
<div class="header">
    <a href="../index.php">
        <img src="../image/logo.png" alt="Logo" class="logo">
    </a>
    <div class="header-center">
        <form action="#" method="get">
            <input type="search" name="search" placeholder="Rechercher...">
        </form>
        <nav>
		<nav class="menu">
			<ul>
				<li><a href="../page/Nousdecouvrir.php">Nous decouvrir</a></li>
				<li><a href="../page/Films.php">Films</a></li>
				<li><a href="../page/forum.php">Forum</a></li>
				<?php if (isset($_SESSION['user'])): ?>
					<li><a href="page/profil.php">Bienvenue,
							<?php echo htmlspecialchars($_SESSION['user']['prenom']) . ' ' . htmlspecialchars($_SESSION['user']['nom']); ?></a>
					</li>
					<li><a href="../back/logout.php">Deconnexion</a></li>
				<?php else: ?>
					
				<?php endif; ?>



			</ul>
		</nav>
        </nav>
    </div>
    <div class="header-right">
        <?php if (isset($_SESSION['user'])): ?>
            <img src="https://phantom-marca.unidadeditorial.es/ddf06b72adb932ec625c2e07329527f0/crop/0x0/1059x706/resize/828/f/jpg/assets/multimedia/imagenes/2022/10/23/16665279627938.png" alt="Avatar" class="avatar">
            <a href="../page/moncompte.php" class="account-link">Voir mon profil</a>
        <?php else: ?>
            <a href="../page/moncompte.php" class="account-link">Mon Compte</a>
            <img src="https://img.freepik.com/psd-gratuit/rendu-3d-du-personnage-avatar_23-2150611746.jpg?w=740&t=st=1714915486~exp=1714916086~hmac=d31e263488e13d3b206cf160c1c80dc48ad5bf8409b6a2680e87f5beeec36385" alt="Avatar" class="avatar">
        <?php endif; ?>
    </div>
</div>
