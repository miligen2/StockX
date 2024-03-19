<?php
include '../API/database.php';
include '../Controleur/stock.php';
$stockAcces = new Stock();


if (isset($_GET["id_stock"])) {
    $id = htmlspecialchars($_GET["id_stock"]);
   $stockArray = $stockAcces->getLesStocksById($id);
    if (!empty($stockArray) && isset($stockArray[0])) {
        $stock = $stockArray[0];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $description= $_POST["description"];
    $qt= $_POST["quantite_disponible"];
    $type = $_POST["type"];
    $stockAcces->updateStock($id,$nom,$description,$qt,$type);


    header("location: ./v_stock.php?titre=Stock");
}
include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
<?php include "modeles/v_titrePage.php" ?>
<div class="container">
    <div class="contenue effet-carte">
        <h2>Modification de <?php echo $stock->nom; ?> </h2>
        <br><br>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="id_stock" value="<?php echo $id; ?>">
                <label>Nom</label>
                <input type="text" name="nom" id=""value=<?php echo $stock->nom ?>>
                <label>Description</label>
                <input type="text" name="description" id=""value="<?php echo $stock->description ?>">
                <label>Quantité</label>
                <input type="number" name="quantite_disponible" id="" value="<?php echo $stock->quantite_disponible ?>">
                <label>Type</label>
                <select name="type">
                    <option value="medicament" <?php if ($stock->type === 'medicament') echo 'selected'; ?>>Médicament</option>
                    <option value="materiel" <?php if ($stock->type === 'materiel') echo 'selected'; ?>>Matériel</option>
                </select>
                <input type="submit" class="btn btn-success" value="Mettre à jour">
            </form>
        </div>

    </div>
</div>

</main>
