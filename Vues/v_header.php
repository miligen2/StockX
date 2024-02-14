<?php
session_start();


if (isset($_SESSION["prenom"]) && isset($_SESSION["nom"])) {
    $messageBienvenue = "<span>Bonjour, " . $_SESSION["prenom"] . " " . $_SESSION["nom"] . "</span>";
} else {
    $messageBienvenue = "<span>Bienvenue</span>";
}
?>


<header>
        <nav>
            <div class="img">
                <img src="../images/Logo/LogoStockX.png" alt="Logo StockX" srcset=""id="img">
                <H1>STOXK X</H1>
            <?php    echo $messageBienvenue ?>
            </div>
            
            <div class="test">
                <ul>
                    <div class="itemList">
                        <img src="../images/IconeinSite/accueil.png" alt="">
                        <li>Dashboard</li>
                    </div>
                    <div class="itemList">
                        <img src="../images/IconeinSite/stock.png" alt="">
                        <li>Stock</li>
                    </div>
                    <div class="itemList">
                        <img src="../images/IconeinSite/verifier.png" alt="">
                        <li>Commande</li>
                    </div>
                    <div class="itemList">
                        <img src="../images/IconeinSite/suivi.png" alt="">
                        <li>Détails commande</li>
                    </div>
                    

                </ul>
                <ul>
                    <div class="itemList">
                        <img src="../images/IconeinSite/se-deconnecter.png" alt="">
                        <li>Déconnexion</li>
                    </div>
                </ul>
            </div>

        </nav>
    </header>