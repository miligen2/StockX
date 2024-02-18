<?php
include '../API/database.php';
include '../Controleur/stock.php';

$dbAcces = new Database();
$stockAcces = new Stock();

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
$stocks = $stockAcces->getLesStocks();
//$type = isset($_GET['categorie']) ? $_GET['categorie'] : 'tous'; // Récupère la valeur de la catégorie depuis la requête GET, sinon par défaut 'tous'

?>
<main>
    <div class="t_space"><h1>Stock </h1></div>
    <div class="container">
        <header>
            <div class="filtre">
                <a href="?categorie=tous">Tous</a>
                <a href="?categorie=materiel">Matériel</a>
                <a href="?categorie=medicament">Médicament</a>
            </div>
        </header>
        <div class="contenue">
            <div class="tableau">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paracétamol</td>
                        <td>Médicament pour soulager la douleur et la fièvre</td>
                        <td>10 médicaments</td>
                        <td>
                            <button>Supprimer</button>
                            <button>Modifier</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            </div>
            
            <br><br><br><br><br>
            









        <?php
    foreach($stocks as $stock){
            echo '<div class="row">' . $stock->nom . ' ' . $stock->description . ' ' . $stock->quantite_disponible . ' ' . $stock->type . '<a href="./v_stockDelete.php?id_stock='. $stock->id_stock . '">Supprimer</a> <a href="./v_stockUpdate.php?id_stock='. $stock->id_stock . '">Modifier</a></div>';   
    } ?>

<?php
 if($_SESSION['role'] == 1)
 {
    echo   '<button id="btnajo"class="btn">Ajouter</button>';
 }

?>
    <dialog id="ajouter">
        <h2>Ajouter des stocks</h2>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>desc</label>
            <input type="text" name="description">
            <label>quantite</label>
            <input type="number" name="quantite">
            <label>type</label>
            <select name="type">
                <option value="medicament">Médicament</option>
                <option value="materiel">Matériel</option>
            </select>
            <input type="submit" class="btn" name="ajouter" value="Ajouter" >

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ajouter']) {
                    $nom = $_POST['nom'];
                    $description = $_POST['description'];
                    $qt_disp = $_POST['quantite'];
                    $type = $_POST['type'];
                    $stockAcces->createStock($nom, $description, $qt_disp, $type);
                    header("Location: ".$_SERVER['PHP_SELF']);
                }
         

            ?>
            
        </form>
        <button id="btnFermerAjouter">fermer</button>
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

