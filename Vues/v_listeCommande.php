<?php
include '../API/database.php';
$db = new Database();
include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
    <?php include 'modeles/v_titrePage.php'; ?>
    <?php $stocks = $db->getLesStocksId();
    foreach($stocks as $stock){
        echo $stock->id_stock;
    } ?>
</main>
<?php
include 'modeles/v_pied.php';

?>
