<div class="header">
    <a href="../index.php">
        <img src="../image/logo.png" alt="Logo" class="logo">
    </a>
    <div class="header-center">
        <form action="#" method="get">
            <input type="search" name="search" placeholder="Rechercher...">
        </form>
        <nav>
            <ul class="menu">
                <li><a href="../page/Nousdecouvrir.php">Nous découvrir</a></li>
                <li><a href="../page/Nosfilms.php">Films</a></li>
                <li><a href="../page/faq.php">Forum</a></li>
            </ul>
        </nav>
    </div>
    <div class="header-right">
        <?php if (isset($_SESSION['user'])): ?>
            <img src="../image/avatar.png" alt="Avatar" class="avatar">
            <a href="../page/moncompte.php" class="account-link">Mon Compte</a>
        <?php else: ?>
            <a href="../page/moncompte.php" class="account-link">Mon Compte</a>
            <img src="https://img.freepik.com/psd-gratuit/rendu-3d-du-personnage-avatar_23-2150611746.jpg?w=740&t=st=1714915486~exp=1714916086~hmac=d31e263488e13d3b206cf160c1c80dc48ad5bf8409b6a2680e87f5beeec36385" alt="Avatar" class="avatar">
        <?php endif; ?>
    </div>
</div>
