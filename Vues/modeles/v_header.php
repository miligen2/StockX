<?php
session_start();


if (isset($_SESSION["prenom"]) && isset($_SESSION["nom"])) {
    $messageBienvenue = "<span>Bonjour, " . $_SESSION["prenom"] . " " . $_SESSION["nom"] . "</span>";
} else {
    $messageBienvenue = "<span>Bienvenue</span>";
}
?>


<header class="h_dashoard">
    <nav>
        <div class="img">
            <img src="../images/Logo/LogoStockX.png" alt="Logo StockX" srcset="" id="img">
            <H1>STOXK X</H1>
            <?php echo $messageBienvenue ?>
        </div>

        <div class="test">
            <ul>
                <div class="itemList">
                    <img src="../images/IconeinSite/accueil.png" alt="">
                    <a href="../Vues/v_accueil.php?titre=DashBoard"><li>Dashboard</li></a>
                </div>
                <div class="itemList">
                    <img src="../images/IconeinSite/stock.png" alt="">
                    <li><a href="../Vues/v_stock.php?titre=Stock">Stock</a></li>
                </div>
                <div class="itemList">
                    <img src="../images/IconeinSite/verifier.png" alt="">
                    <a href="../Vues/v_commande.php?titre=Commande"><li>Commande</li></a>
                </div>
                <div class="itemList">
                    <img src="../images/IconeinSite/suivi.png" alt="">
                    <a href="../Vues/v_commande.php?titre=Liste Commande"><li>Détails commande</li></a>
                </div>


            </ul>
            <ul>
                <div class="itemList">
                    <img src="../images/IconeinSite/se-deconnecter.png" alt="">
                    <a href="../Controleur/logout.php"><li>Déconnexion</li></a>
                </div>
            </ul>
        </div>

    </nav>
</header>
