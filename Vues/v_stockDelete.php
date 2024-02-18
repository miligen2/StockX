<?php
include '../API/database.php';
include '../Controleur/stock.php';
$stockAcces = new Stock();


if (isset($_GET["id_stock"])) {
    $id = htmlspecialchars($_GET["id_stock"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stockAcces->deleteStock($id);

    header("location: ./v_stock.php");
}

?>
<div>
    <form action="" method="POST">
        <input type="hidden" name="id_stock" value="<?php echo $id; ?>">
        <input type="submit" value="Êtes-vous sûr de supprimer ?">
    </form>
</div>
