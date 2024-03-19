<?php
session_start();
$id_user = $_SESSION['user-id'];


include '../API/database.php';
include '../Controleur/commandes.php';
include '../Controleur/stock.php';
$db = new Database();
$commandAcces = new Commande();
$stockAcces = new Stock();

$commands = $commandAcces->getCommandes();
$stocks =  $stockAcces->getLesStocks();

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
<?php include "modeles/v_titrePage.php" ?>

<div class="container">
    <div class="contenue effet-carte">
    <h2>Création d'une commande</h2>
        <form action="" method="POST">
            <label>Commandé par :</label>
            <input type="text" name="commandepar" value="<?php echo htmlspecialchars($_SESSION["prenom"] . " " . $_SESSION["nom"]); ?>" readonly>
            <label>Stock</label>
            <select name="id_stock">
            <?php foreach ($stocks as $stock){ ?>
                <option value="<?php echo htmlspecialchars($stock->id_stock); ?>"><?php echo htmlspecialchars($stock->nom); ?></option>
            <?php }?>
                
            </select>
            <label>Quantite</label>
            <input type="number" name="quantite" value="30">
            <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter" >

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ajouter']) {
                    $quantite = $_POST['quantite'];
                    $id_stock = $_POST['id_stock'];
    

                    $id_commande = $commandAcces->creatCommande($id_user);
                    $error = $commandAcces->creatCommande2($id_commande,$quantite,$id_stock);

                    


                    if ($error) { ?> 
                    <div class="error-message">
                         Erreur lors de l'ajout de la commande. Veuillez réessayer.
                     </div> <?php
                    } else { ?>
                        <div class="success-message">
                        La commande a été ajoutée avec succès.
                        </div>
                    <?php }
                }
         

            ?>
            
        </form>

    </div>

</div>

</main>

<?php
include 'modeles/v_pied.php';

?>
