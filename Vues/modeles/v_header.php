<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


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
                <div class="titreHeader">MENU</div>
                <div class="itemList">
                    <li>
                        <a href="../Vues/v_accueil.php?titre=Dashobard">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="15px"><path d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z"/></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </div>
                <div class="titreHeader">APPLICATION</div>
                <div class="itemList">
                    <li>
                        <a href="../Vues/v_stock.php?titre=Inventaire">
                          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="15" ><path d="M23.621,6.836l-1.352-2.826c-.349-.73-.99-1.296-1.758-1.552L14.214,.359c-1.428-.476-3-.476-4.428,0L3.49,2.458c-.769,.256-1.41,.823-1.759,1.554L.445,6.719c-.477,.792-.567,1.742-.247,2.609,.309,.84,.964,1.49,1.802,1.796l-.005,6.314c-.002,2.158,1.372,4.066,3.418,4.748l4.365,1.455c.714,.238,1.464,.357,2.214,.357s1.5-.119,2.214-.357l4.369-1.457c2.043-.681,3.417-2.585,3.419-4.739l.005-6.32c.846-.297,1.508-.946,1.819-1.79,.317-.858,.228-1.799-.198-2.499ZM10.419,2.257c1.02-.34,2.143-.34,3.162,0l4.248,1.416-5.822,1.95-5.834-1.95,4.246-1.415ZM2.204,7.666l1.327-2.782c.048,.025,7.057,2.373,7.057,2.373l-1.621,3.258c-.239,.398-.735,.582-1.173,.434l-5.081-1.693c-.297-.099-.53-.325-.639-.619-.109-.294-.078-.616,.129-.97Zm3.841,12.623c-1.228-.409-2.052-1.554-2.051-2.848l.005-5.648,3.162,1.054c1.344,.448,2.792-.087,3.559-1.371l.278-.557-.005,10.981c-.197-.04-.391-.091-.581-.155l-4.366-1.455Zm11.897-.001l-4.37,1.457c-.19,.063-.384,.115-.581,.155l.005-10.995,.319,.64c.556,.928,1.532,1.459,2.561,1.459,.319,0,.643-.051,.96-.157l3.161-1.053-.005,5.651c0,1.292-.826,2.435-2.052,2.844Zm4-11.644c-.105,.285-.331,.504-.619,.6l-5.118,1.706c-.438,.147-.934-.035-1.136-.365l-1.655-3.323s7.006-2.351,7.054-2.377l1.393,2.901c.157,.261,.186,.574,.081,.859Z"/></svg>
                          <span>Inventaire</span>
                        </a>
                    </li>
                </div>
                <div class="itemList">
                    <li>
                        <a href="../Vues/v_sortie.php?titre=Sortie">
                          <svg width="15px" height="15px" viewBox="0 0 21.00 21.00" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="1.596"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="none" fill-rule="evenodd" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" transform="translate(3 3)"> <path d="m3.5 4.753 4-4.253 4 4.212"></path> <path d="m7.5.5v11"></path> <path d="m.5 14.5h14"></path> </g> </g></svg>
                          <span>Sortie</span>
                        </a>
                    </li>
                </div>
                <?php
                    if($_SESSION['role'] == 1)
                    {
                        echo '  <div class="itemList">';
                        echo '<li>';
                        echo '<a href="../Vues/v_commande.php?titre=Commande">';
                        echo '<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="15">';
                        echo '<path d="m2,2.5c0-1.381,1.119-2.5,2.5-2.5s2.5,1.119,2.5,2.5-1.119,2.5-2.5,2.5-2.5-1.119-2.5-2.5Zm4,12.5H2v-6c0-.552.449-1,1-1h12v-2H3c-1.654,0-3,1.346-3,3v8h2v7h2v-7h2v7h2v-14h-2v5Zm18,3.5v5.5h-14v-5.5c0-1.379,1.122-2.5,2.5-2.5h.5v-3.5c0-1.379,1.122-2.5,2.5-2.5h3c1.378,0,2.5,1.121,2.5,2.5v3.5h.5c1.378,0,2.5,1.121,2.5,2.5Zm-9-2.5h4v-3.5c0-.275-.224-.5-.5-.5h-3c-.276,0-.5.225-.5.5v3.5Zm1,2.5c0-.275-.224-.5-.5-.5h-3c-.276,0-.5.225-.5.5v3.5h4v-3.5Zm6,0c0-.275-.224-.5-.5-.5h-3c-.276,0-.5.225-.5.5v3.5h4v-3.5Z"/>';
                        echo '</svg>';
                        echo '<span>Commande</span>';
                        echo '</a>';
                        echo '</li>';
                        echo '</div>';
                    }
                ?>
                <div class="itemList">
                    <li>
                        <a href="../Vues/v_listeCommande.php?titre=Historique Entrée / Sortie">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" width="15"><path d="M12,0A11.972,11.972,0,0,0,4,3.073V1A1,1,0,0,0,2,1V4A3,3,0,0,0,5,7H8A1,1,0,0,0,8,5H5a.854.854,0,0,1-.1-.021A9.987,9.987,0,1,1,2,12a1,1,0,0,0-2,0A12,12,0,1,0,12,0Z"/><path d="M12,6a1,1,0,0,0-1,1v5a1,1,0,0,0,.293.707l3,3a1,1,0,0,0,1.414-1.414L13,11.586V7A1,1,0,0,0,12,6Z"/></svg>
                           <span>Historique</span>
                        </a>
                    </li>
                </div>
            </ul>
            <ul>
                <li class=titreHeader>DÉCONNEXION </li>
                <div class="itemList">
                    <li>
                        <a href="../Controleur/logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="15" ><path d="M22.763,10.232l-4.95-4.95L16.4,6.7,20.7,11H6.617v2H20.7l-4.3,4.3,1.414,1.414,4.95-4.95a2.5,2.5,0,0,0,0-3.536Z"/><path d="M10.476,21a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V3A1,1,0,0,1,3,2H9.476a1,1,0,0,1,1,1V8.333h2V3a3,3,0,0,0-3-3H3A3,3,0,0,0,0,3V21a3,3,0,0,0,3,3H9.476a3,3,0,0,0,3-3V15.667h-2Z"/></svg>
                            <span>Déconnexion</span>
                        </a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</header>
