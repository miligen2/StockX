<?php
session_start();
include '../API/database.php';
include '../Controleur/dashboard.php';


$dashboardAcces = new Dashboard();
$stocknumber = $dashboardAcces->getTotalstocks();

include "modeles/v_entete.php";
include "modeles/v_header.php";
?>
<main>
    <div class="t_space"><h1>Dashboard </h1></div>
    <div class="Dcontainer">
        <div class="row">
            <div class="Dcard">
                <div class="DheaderCard row">
                    <h3>Information Stock</h3>
                </div>
                <div class="DcardContainer">
                    <div class="Dleft">
                        <h4>Total Stock:</h4>
                        <?php echo "<h2>". $stocknumber. "</h2>";?>
                        <p>Depuis le 12 mai 2023</p>
                        <!-- (aller chercher de puis mouvement) -->
                    </div>
                    <div class="Dright">
                        <h4>Refaire le Stock:</h4>
                        <div class="product-row">
                            <div class="product-name">Gant latex</div>
                            <div class="product-quantity">12</div>
                        </div>
                        <div class="product-row">
                            <div class="product-name">Pomme de reinette</div>
                            <div class="product-quantity">5</div>
                        </div>
                        <div class="product-row">
                            <div class="product-name">Test</div>
                            <div class="product-quantity">35</div>
                        </div>
                    </div>  
                </div>
                <table>
                    <thead>
                        <th>nom du produit</th>
                        <th>quantité disponible </th>
                        <th>etat stock</th>
                        <th>date du dernier mouvemetn</th>
                    </thead>
                    <tbody>
                        <tr>
                        <td>TestProduits</td>
                        <td>12</td>
                        <td>Jsp quoi mettre</td>
                        <td>12/12/12</td>
                        <tr>
                        <tr>
                            <td>test</td>
                            <td>342</td>
                            <td>trait_exist</td>
                            <td>test</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
<?php
include "modeles/v_pied.php";
?>

