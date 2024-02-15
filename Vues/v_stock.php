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
    <?php include 'modeles/v_titrePage.php'; ?>


    <div class="container">
        <header>
            <div class="filtre">
                <a href="?categorie=tous">Tous</a>
                <a href="?categorie=materiel">Matériel</a>
                <a href="?categorie=medicament">Médicament</a>
            </div>
        </header>
        <div class="contenue">
        <?php
    foreach($stocks as $stock){
            echo '<div class="row" name="'. $stock->id_stock .'">' . $stock->nom . ' ' . $stock->description . ' ' . $stock->quantite_disponible . ' ' . $stock->type . '</div>';   
    } ?>

    
    <dialog id="supprimer">
        <h2>Supprimer cet objet</h2>
        <p>êtes vous sur de vouloir supprimer ? </p>


    </dialog>


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
            <input type="text" name="nom" id="">
            <label>desc</label>
            <input type="text" name="description">
            <label>quantite</label>
            <input type="text" name="quantite" id="">
            <label>type</label>
            <select name="type">
                <option value="medicament">Médicament</option>
                <option value="materiel">Matériel</option>
            </select>
            <input type="submit" class="btn" value="Ajouter" >

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nom = $_POST['nom'];
                    $description = $_POST['description'];
                    $qt_disp = $_POST['quantite'];
                    $type = $_POST['type'];
                    $stockAcces->createStock($nom, $description, $qt_disp, $type);
                    header("Location: ".$_SERVER['PHP_SELF']);
                }
         

            ?>
            
        </form>
    </dialog>
 






    <script>
    const boiteDeDialogue2 = document.querySelector('#ajouter');
    const ouvrirBouton = document.querySelector('.ouvrirBoiteDeDialogue');
    const ouvrirBouton2 = document.getElementById('btnajo');


    ouvrirBouton2.addEventListener('click', () => {
    boiteDeDialogue2.showModal();
  });

    ouvrirBouton.addEventListener('click', () => {
    boiteDeDialogue.showModal();
  });
 
  fermerBouton.addEventListener('click', () => {
    boiteDeDialogue.close();
  });


    </script>
    

        </div>
    </div>
</main>
<?php
include 'modeles/v_pied.php';

?>

