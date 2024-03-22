<?php

include '../API/database.php';
include '../Controleur/dashboard.php';


$dashboardAcces = new Dashboard();
$stocknumber = $dashboardAcces->getTotalstocks();
$stockCritical = $dashboardAcces->get3criticalsSTocks();
$last3command = $dashboardAcces->get3DernieresCommandes();

$numberOfCommand= $dashboardAcces->getCommandeEnAttente();
$numberValideCommand = $dashboardAcces->getNombreDeCommandeRealise();
$lastDateCommand = $dashboardAcces->getDateLastCommands();



include "modeles/v_entete.php";
include "modeles/v_header.php";
?>
<main>
    <?php include "modeles/v_titrePage.php" ?>
    <div class="Dcontainer">
    

        <div class="wrapper">
                <div class="wrapper-element">
                    <a href="../Vues/v_stock.php?titre=Inventaire">
                        <div class="row"> 
                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4856 1.12584C12.1836 0.958052 11.8164 0.958052 11.5144 1.12584L2.51436 6.12584L2.5073 6.13784L2.49287 6.13802C2.18749 6.3177 2 6.64568 2 7V16.9999C2 17.3631 2.19689 17.6977 2.51436 17.874L11.5022 22.8673C11.8059 23.0416 12.1791 23.0445 12.4856 22.8742L21.4856 17.8742C21.8031 17.6978 22 17.3632 22 17V7C22 6.64568 21.8125 6.31781 21.5071 6.13813C21.4996 6.13372 21.4921 6.12942 21.4845 6.12522L12.4856 1.12584ZM5.05923 6.99995L12.0001 10.856L14.4855 9.47519L7.74296 5.50898L5.05923 6.99995ZM16.5142 8.34816L18.9409 7L12 3.14396L9.77162 4.38195L16.5142 8.34816ZM4 16.4115V8.69951L11 12.5884V20.3004L4 16.4115ZM13 20.3005V12.5884L20 8.69951V16.4116L13 20.3005Z" fill="#2d2d49bf"></path> </g></svg>
                            <h2>Inventaire</h2>
                        </div>
                        <div class="row center BigFont"><h1><?php echo $stocknumber ?></h1></div>
                        <div class="row center "><p>Depuis le <?php echo date('d F Y', strtotime($lastDateCommand)); ?></p></div>
                    </a>
                </div>

                <div class="wrapper-element">
                    <a href="../Vues/v_commande.php?titre=Commande">
                        <div class="row"> 
                            <svg viewBox="0 0 24 24" width="50px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.17004 7.43994L12 12.5499L20.77 7.46991" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 21.6099V12.5399" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.61 9.17V14.83C21.61 14.88 21.61 14.92 21.6 14.97C20.9 14.36 20 14 19 14C18.06 14 17.19 14.33 16.5 14.88C15.58 15.61 15 16.74 15 18C15 18.75 15.21 19.46 15.58 20.06C15.67 20.22 15.78 20.37 15.9 20.51L14.07 21.52C12.93 22.16 11.07 22.16 9.92999 21.52L4.59 18.56C3.38 17.89 2.39001 16.21 2.39001 14.83V9.17C2.39001 7.79 3.38 6.11002 4.59 5.44002L9.92999 2.48C11.07 1.84 12.93 1.84 14.07 2.48L19.41 5.44002C20.62 6.11002 21.61 7.79 21.61 9.17Z" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M23 18C23 18.75 22.79 19.46 22.42 20.06C22.21 20.42 21.94 20.74 21.63 21C20.93 21.63 20.01 22 19 22C17.54 22 16.27 21.22 15.58 20.06C15.21 19.46 15 18.75 15 18C15 16.74 15.58 15.61 16.5 14.88C17.19 14.33 18.06 14 19 14C21.21 14 23 15.79 23 18Z" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.07 19.0399L17.95 16.9299" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.05 16.96L17.93 19.0699" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <h2>Critique</h2>
                        </div>
                        <div class="Dright">
                        <?php 
                            if ($stockCritical){
                            foreach ($stockCritical as $critical) { ?>
                            <div class="product-row">
                                <div class="product-name"><?php echo $critical->nom; ?></div>
                                <div class="product-quantity"><?php echo $critical->quantite_disponible; ?></div>
                            </div>
                        <?php }} else {echo ' <h2 class="center">Vous êtes à jour</h2>';} ?>
                        </div>
                        <div class=""></div>
                    </a>
                </div>

    

                <div class="wrapper-element">
                    <a href="../Vues/v_listeCommande.php?titre=Historique">
                        <div class="row"> 
                            <svg width="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.17004 7.43994L12 12.5499L20.77 7.46991" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 21.6099V12.5399" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.61 9.17V14.83C21.61 14.88 21.61 14.92 21.6 14.97C20.9 14.36 20 14 19 14C18.06 14 17.19 14.33 16.5 14.88C15.58 15.61 15 16.74 15 18C15 18.75 15.21 19.46 15.58 20.06C15.67 20.22 15.78 20.37 15.9 20.51L14.07 21.52C12.93 22.16 11.07 22.16 9.92999 21.52L4.59 18.56C3.38 17.89 2.39001 16.21 2.39001 14.83V9.17C2.39001 7.79 3.38 6.11002 4.59 5.44002L9.92999 2.48C11.07 1.84 12.93 1.84 14.07 2.48L19.41 5.44002C20.62 6.11002 21.61 7.79 21.61 9.17Z" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M23 18C23 19.2 22.47 20.27 21.64 21C20.93 21.62 20.01 22 19 22C16.79 22 15 20.21 15 18C15 16.74 15.58 15.61 16.5 14.88C17.19 14.33 18.06 14 19 14C21.21 14 23 15.79 23 18Z" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.25 16.75V18.25L18 19" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                           
                            <h2>Dernieres Commandes </h2>
                        </div>
                        <div class="Dright">
                        <?php foreach ($last3command as $l) { ?>
                        <div class="Dcommande">
                            <div class="Dcommande-info">
                                <span class="Dcommande-id"><?php echo $l->id_commande; ?></span>
                                <span class="Dcommande-date"><?php echo $l->date_commande; ?></span>
                            </div>
                            <div class="Dcommande-statut <?php echo $l->statut; ?>">
                                <?php echo $l->statut; ?>
                            </div>
                            <div class="Dcommande-details">
                                <div class="Dcommande-detail">
                                    <span class="Dcommande-nom"><?php echo $l->nom; ?></span>
                                    <span class="Dcommande-quantite"><?php echo $l->quantite; ?></span>
                                    <span class="Dcommande-quantite <?php echo $l->entree_sortie; ?>" style="padding-left:5px;"><?php echo $l->entree_sortie; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        </div>
                        <div class=""></div>
         
                    </a>
                </div>
                <div class="wrapper-element">
                    <a href="../Vues/v_listeCommande.php?titre=Historique">
                        <div class="row"> 
                            <svg width="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.17004 7.43994L12 12.5499L20.77 7.46991" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 21.6099V12.5399" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.61 9.17V14.83C21.61 14.88 21.61 14.92 21.6 14.97C20.9 14.36 20 14 19 14C18.06 14 17.19 14.33 16.5 14.88C15.58 15.61 15 16.74 15 18C15 18.75 15.21 19.46 15.58 20.06C15.67 20.22 15.78 20.37 15.9 20.51L14.07 21.52C12.93 22.16 11.07 22.16 9.92999 21.52L4.59 18.56C3.38 17.89 2.39001 16.21 2.39001 14.83V9.17C2.39001 7.79 3.38 6.11002 4.59 5.44002L9.92999 2.48C11.07 1.84 12.93 1.84 14.07 2.48L19.41 5.44002C20.62 6.11002 21.61 7.79 21.61 9.17Z" stroke="#2d2d49bf" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M23 18C23 19.2 22.47 20.27 21.64 21C20.93 21.62 20.01 22 19 22C16.79 22 15 20.21 15 18C15 16.74 15.58 15.61 16.5 14.88C17.19 14.33 18.06 14 19 14C21.21 14 23 15.79 23 18Z" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.25 16.75V18.25L18 19" stroke="#2d2d49bf" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                           
                            <h2>Commandes en attente</h2>
                        </div>
                        <div class="row center BigFont"><h1><?php echo $numberOfCommand ?></h1></div>
                        <div class=""></div>
                    </a>
                </div>
                <div class="wrapper-element">
                    <a href="../Vues/v_listeCommande.php?titre=Historique">
                        <div class="row"> 
                            <svg width="50px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10.0303 13.4697C9.73744 13.1768 9.26256 13.1768 8.96967 13.4697C8.67678 13.7626 8.67678 14.2374 8.96967 14.5303L10.0303 13.4697ZM11.5 16L10.9697 16.5303C11.2626 16.8232 11.7374 16.8232 12.0303 16.5303L11.5 16ZM16.0303 12.5303C16.3232 12.2374 16.3232 11.7626 16.0303 11.4697C15.7374 11.1768 15.2626 11.1768 14.9697 11.4697L16.0303 12.5303ZM4.76942 9.13841C4.67576 9.5419 4.92693 9.94492 5.33041 10.0386C5.7339 10.1322 6.13692 9.88107 6.23058 9.47759L4.76942 9.13841ZM6.5 5V4.25C6.15112 4.25 5.84831 4.49057 5.76942 4.83041L6.5 5ZM12.5 5.75C12.9142 5.75 13.25 5.41421 13.25 5C13.25 4.58579 12.9142 4.25 12.5 4.25V5.75ZM6.25 9.308C6.25 8.89379 5.91421 8.558 5.5 8.558C5.08579 8.558 4.75 8.89379 4.75 9.308H6.25ZM5.5 19H4.75C4.75 19.4142 5.08579 19.75 5.5 19.75V19ZM19.5 19V19.75C19.9142 19.75 20.25 19.4142 20.25 19H19.5ZM20.25 9.308C20.25 8.89379 19.9142 8.558 19.5 8.558C19.0858 8.558 18.75 8.89379 18.75 9.308H20.25ZM5.5 8.558C5.08579 8.558 4.75 8.89379 4.75 9.308C4.75 9.72221 5.08579 10.058 5.5 10.058V8.558ZM12.5 10.058C12.9142 10.058 13.25 9.72221 13.25 9.308C13.25 8.89379 12.9142 8.558 12.5 8.558V10.058ZM11.75 9.308C11.75 9.72221 12.0858 10.058 12.5 10.058C12.9142 10.058 13.25 9.72221 13.25 9.308H11.75ZM13.25 5C13.25 4.58579 12.9142 4.25 12.5 4.25C12.0858 4.25 11.75 4.58579 11.75 5H13.25ZM12.5 8.558C12.0858 8.558 11.75 8.89379 11.75 9.308C11.75 9.72221 12.0858 10.058 12.5 10.058V8.558ZM19.5 10.058C19.9142 10.058 20.25 9.72221 20.25 9.308C20.25 8.89379 19.9142 8.558 19.5 8.558V10.058ZM13.25 9.308C13.25 8.89379 12.9142 8.558 12.5 8.558C12.0858 8.558 11.75 8.89379 11.75 9.308H13.25ZM11.75 11C11.75 11.4142 12.0858 11.75 12.5 11.75C12.9142 11.75 13.25 11.4142 13.25 11H11.75ZM12.5 4.25C12.0858 4.25 11.75 4.58579 11.75 5C11.75 5.41421 12.0858 5.75 12.5 5.75V4.25ZM18.5 5L19.2306 4.83041C19.1517 4.49057 18.8489 4.25 18.5 4.25V5ZM18.7694 9.47759C18.8631 9.88107 19.2661 10.1322 19.6696 10.0386C20.0731 9.94492 20.3242 9.5419 20.2306 9.13841L18.7694 9.47759ZM8.96967 14.5303L10.9697 16.5303L12.0303 15.4697L10.0303 13.4697L8.96967 14.5303ZM12.0303 16.5303L16.0303 12.5303L14.9697 11.4697L10.9697 15.4697L12.0303 16.5303ZM6.23058 9.47759L7.23058 5.16959L5.76942 4.83041L4.76942 9.13841L6.23058 9.47759ZM6.5 5.75H12.5V4.25H6.5V5.75ZM4.75 9.308V19H6.25V9.308H4.75ZM5.5 19.75H19.5V18.25H5.5V19.75ZM20.25 19V9.308H18.75V19H20.25ZM5.5 10.058H12.5V8.558H5.5V10.058ZM13.25 9.308V5H11.75V9.308H13.25ZM12.5 10.058H19.5V8.558H12.5V10.058ZM11.75 9.308V11H13.25V9.308H11.75ZM12.5 5.75H18.5V4.25H12.5V5.75ZM17.7694 5.16959L18.7694 9.47759L20.2306 9.13841L19.2306 4.83041L17.7694 5.16959Z" fill="#2d2d49bf"></path> </g></svg>
                            <h2>Commandes validée</h2>
                        </div>
                        <div class="row center BigFont"><h1><?php echo $numberValideCommand ?></h1></div>
                        <div class=""></div>
                    </a>
                </div>
        </div>
    </div>
</main>
<?php
include "modeles/v_pied.php";
?>

