<?php
session_start();

$id_user = $_SESSION['user-id'];

include '../API/database.php';
include '../Controleur/stock.php';
include '../Controleur/historique.php';
include '../Controleur/commandes.php';

$db = new Database();


$stockAcces = new Stock();
$commandeAcces = new Commande();
$historiqueAcces = new Historique();



if (isset($_GET["id_stock"])) {
    $id = htmlspecialchars($_GET["id_stock"]);
   $stockArray = $stockAcces->getLesStocksById($id);
    if (!empty($stockArray) && isset($stockArray[0])) {
        $stock = $stockArray[0];
    }
}


include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
<?php include "modeles/v_titrePage.php" ?>
<div class="container">
    <div class="contenue effet-carte">
        <h2>Sortie de <?php echo $stock->nom; ?> </h2>
        <br><br>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="id_stock" value="<?php echo $id; ?>">
                <label>Nom</label>
                <input type="text" name="nom" id=""value=<?php echo $stock->nom ?> readonly>
                <label>Quantité</label>
                <input type="number" name="quantite_soustrait" value="0">
                <input type="submit" name="sortie" class="btn btn-success" value="Faire une sortie">

                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sortie']) {

                    $quantite = $_POST["quantite_soustrait"];
                    $id_stock = $_POST['id_stock'];


                    $id_commande = $commandeAcces->creatCommandeSortie($id_user);
         
                    $erreur = $commandeAcces->creatCommande2($id_commande,$quantite,$id_stock);
               

                    $historiqueAcces->updateStockDecrease($quantite,$id_stock);

                    if ($erreur) { ?> 
                        <div class="error-message">
                             Erreur lors de la sortie. Veuillez réésayer.
                         </div> <?php
                        } else { ?>
                            <div class="success-message">
                                Sortie à été faite avec succés.
                            </div>
                        <?php }
                    


                    } ?>
            </form>
        </div>

    </div>
</div>

</main>
