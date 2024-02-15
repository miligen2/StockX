<?php
include '../API/database.php';
$db = new Database();
include 'modeles/v_entete.php';
include 'modeles/v_header.php';
$stocks = $db->getLesStocks();
$type = isset($_GET['categorie']) ? $_GET['categorie'] : 'tous'; // Récupère la valeur de la catégorie depuis la requête GET, sinon par défaut 'tous'

?>
<main>
    <?php include 'modeles/v_titrePage.php'; ?>


    <div class="container">
        <header>
            <div class="filtre">
                <a href="?categorie=tous">Tous</a>
                <a href="?categorie=materiel">Matériel</a>
                <a href="?categorie=medicament">Médicament</a>
            </div>
        </header>
        <div class="contenue">
        <?php
    foreach($stocks as $stock){
            echo '<div class="row">' . $stock->nom . ' ' . $stock->description . ' ' . $stock->quantite_disponible . ' ' . $stock->type . '</div>';   
    } ?>
        

        </div>
    </div>
</main>
<?php
include 'modeles/v_pied.php';

?>

