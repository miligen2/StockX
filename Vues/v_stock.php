<?php

include '../API/database.php';
include '../Controleur/stock.php';

$dbAcces = new Database();
$stockAcces = new Stock();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ajouter']) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $qt_disp = $_POST['quantite'];
    $type = $_POST['type'];
    $error = $stockAcces->createStock($nom, $description, $qt_disp, $type);
    sleep(1);
    header("Location: " . $_SERVER['PHP_SELF'] . "?titre=Invetaire");
    exit();
}

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
$stocks = $stockAcces->getLesStocks();


$searchTerm = isset($_GET['search']) ? $_GET['search'] : ''; // Récupère la valeur de recherche

if (!empty($searchTerm)) {
    // Filtrer les résultats en fonction du terme de recherche
    $filteredStocks = array_filter($stocks, function ($stock) use ($searchTerm) {
        // Vérifier si le terme de recherche est présent dans le nom ou la description du stock
        return strpos(strtolower($stock->nom), strtolower($searchTerm)) !== false || 
               strpos(strtolower($stock->description), strtolower($searchTerm)) !== false;
    });

    // Utiliser les résultats filtrés pour l'affichage
    $stocks = $filteredStocks;
}

?>
<main>
<?php include "modeles/v_titrePage.php" ?>
    <div class="container">
        <div class="contenue effet-carte ">
            <header>
                <div class="row header-search">
                    <div class="control">
                        <form class="row" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="search" name="search" placeholder="Rechercher.." class="form-control">
                            <button style="margin-left: 10px;" type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>
                    
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ajouter']) {
                        if ($error) {
                            echo '<div class="error-message">';
                            echo "Erreur lors de l'ajout de la commande. Veuillez réessayer.";
                            echo "</div>";
                        } else {
                            echo '<div class="success-message">';
                            echo 'La commande a été ajoutée avec succès.';
                            echo '</div>';
                        }
                    }
                    if($_SESSION['role'] == 1)
                    {
                        echo   '<button id="btnajo"class="btn btn-success"><span>+</span> Ajouter nouveau stock</button>';
                    }

                    ?>
                </div>
                
            </header>
            <div class="tableau">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Type</th>
                        <th>Détails</th>
                        <?php if($_SESSION['role'] == 1){ echo "<th>Actions</th>"; } ?>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                if (empty($stocks)) {
                    echo "<tr><td colspan='6'>Aucun résultat trouvé.</td></tr>";
                } else {
                    foreach ($stocks as $stock) {
                        echo "<tr>";
                        echo "<td>" . $stock->nom . "</td>";
                        echo "<td>" . $stock->description . "</td>";
                        echo "<td>" . $stock->quantite_disponible . "</td>";
                        echo "<td>" . $stock->type . "</td>";
                        echo '<td>
                        <a href="./v_stockDetails.php?id_stock=' .$stock->id_stock .'&titre=Details de '.$stock->nom.'&nom='.$stock->nom.'&description='. $stock->description.'&quantite='. $stock->quantite_disponible .'&type='.$stock->type .'">
                            <svg width="25px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M320 89.6h640v76.8H320V89.6z m0 768h640v76.8H320v-76.8z m-256-768h128v76.8H64V89.6z m256 384h640v76.8H320V473.6z m-256 0h128v76.8H64V473.6z m0 384h128v76.8H64v-76.8z" fill="#000000"></path></g></svg>
                        </a>
                        </td>';
                        if($_SESSION['role'] == 1) {
                        echo '<td>
                                <a href="./v_stockUpdate.php?id_stock=' . $stock->id_stock . '&titre=Modification de '.$stock->nom.'">
                                    <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#6dcba3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                                </a>
                                <a href="./v_stockDelete.php?id_stock=' . $stock->id_stock . '&nom='.$stock->nom .'&titre=Suppression de '.$stock->nom.'">
                                    <svg width="25px"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#e1665d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </a>
                            </td>'; }
                        echo "</tr>";
                    }
                }
                    ?>

                </tbody>
            </table>

            </div>
            








    <dialog id="ajouter">
        <div class="row header-search">
            <h2>Ajouter des stocks</h2>
            <span id="btnFermerAjouter">X</span>

        </div>
  
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Description</label>
            <input type="text" name="description">
            <label>Quantite</label>
            <input type="number" name="quantite">
            <label>Type</label>
            <select name="type">
                <option value="medicament">Médicament</option>
                <option value="materiel">Matériel</option>
            </select>
            <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter" >


        </form>

    </dialog>
 

            





    <script>
    const DialogueAjouter = document.querySelector('#ajouter');
    const ouvrirDialogueAjouter = document.getElementById('btnajo');
    const fermerBoutonDialogueAjouter = document.getElementById('btnFermerAjouter');

    ouvrirDialogueAjouter.addEventListener('click', () => {
    DialogueAjouter.showModal();
  });
 
  fermerBoutonDialogueAjouter.addEventListener('click', () => {
    DialogueAjouter.close();
  });

    </script>
    

        </div>
    </div>
</main>
<?php
include 'modeles/v_pied.php';

?>

