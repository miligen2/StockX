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


    header("location: ./v_stock.php");
}
include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>

<div>
    <form action="" method="POST">
        <input type="hidden" name="id_stock" value="<?php echo $id; ?>">
        <input type="text" name="nom" id=""value=<?php echo $stock->nom ?>>
        <input type="text" name="description" id=""value="<?php echo $stock->description ?>">
        <input type="number" name="quantite_disponible" id="" value="<?php echo $stock->quantite_disponible ?>">
        <select name="type">
            <option value="medicament" <?php if ($stock->type === 'medicament') echo 'selected'; ?>>Médicament</option>
            <option value="materiel" <?php if ($stock->type === 'materiel') echo 'selected'; ?>>Matériel</option>
            </select>

        <input type="submit" value="Mettre à jour">
    </form>
</div>
</main>
