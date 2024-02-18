<?php
include '../API/database.php';
$db = new Database();
include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
<div class="t_space"><h1>Liste Commande </h1></div>
   
    <?php $stocks = $db->getLesStocksId();
    foreach($stocks as $stock){
        echo $stock->id_stock;
    } ?>
</main>
<?php
include 'modeles/v_pied.php';

?>
