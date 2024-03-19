<?php
include '../API/database.php';
include '../Controleur/stock.php';

include 'modeles/v_entete.php';
include 'modeles/v_header.php';


$nomArticle = $_GET["nom"];
$desc = $_GET["description"];
$quantite = $_GET["quantite"];
$type = $_GET["type"];


?>

<main>
<?php include "modeles/v_titrePage.php" ?>
    <div class="container">
        <div class="contenue effet-carte">
            <article>
                <h2 class="article-title"><?php echo $nomArticle;?></h2>
                <p class="article-description"><?php echo $desc;?></p>
                <div class="article-details">
                    <p>Quantité: <span class="quantite"><?php echo $quantite;?></span></p>
                    <p>Type: <span class="type"><?php echo $type;?></span></p>
                </div>
            </article>

        </div>
    </div>




</main>


<?php
include 'modeles/v_pied.php';

?>

