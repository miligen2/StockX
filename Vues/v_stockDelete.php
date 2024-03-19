<?php
include '../API/database.php';
include '../Controleur/stock.php';
$stockAcces = new Stock();

$nomItem = $_GET["nom"];


if (isset($_GET["id_stock"])) {
    $id = htmlspecialchars($_GET["id_stock"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Supprimer"]) {
    $stockAcces->deleteStock($id);

    header("location: ./v_stock.php?titre=stock");
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Non"])
{
    header("location: ./v_stock.php?titre=stock");
}


include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
<?php include "modeles/v_titrePage.php" ?>
    <div class="container">
        <div class="contenue effet-carte">
            <h2>Êtes-Vous sur de vouloir supprimer : <?php echo $nomItem ?> ?</h2>
            <br>
            <br>
            <form action="" method="POST">
                <input type="hidden" name="id_stock" value="<?php echo $id; ?>">
                <input type="submit" class="btn btn-success" name="Supprimer" value="Oui !">
                <input type="submit" class="btn btn-denied" name="Non" value="Non !">
            </form>
        </div>
    </div>
<div>

</div>

</main>


<?php
include 'modeles/v_pied.php';

?>

