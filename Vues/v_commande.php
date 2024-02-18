<?php
include '../API/database.php';
include '../Controleur/commandes.php';
include '../Controleur/stock.php';
$db = new Database();
$commandAcces = new Commande();
$stockAcces = new Stock();

$commands = $commandAcces->getCommandes();
$stocks =  $stockAcces->getLesStocks();

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
<div class="t_space"><h1>Commadne </h1></div>
<button class="btn" id="btnCréer">Créer une commande</button>

<dialog id="AddCommand">
    <h2>Créer une commande</h2>
    <form method="POST" action="">
    <label for="">Nom produit</label>
        <select name="stock" id="stock">
            <?php foreach ($stocks as $stock) {
                echo "<option value=\"$stock->id_stock\">$stock->nom</option>";
            } ?>
        </select>
        
        <label for="">Commande créé</label>
        <input readonly type="datetime-local" name="date" id="date" value="<?php echo date('Y-m-d\TH:i:s'); ?>">
        <label for="">Commandé par</label>
        <input readonly type="text" name="<?php echo $_SESSION['user-id'] ?>" id="" value="<?php echo $_SESSION['nom'] ?>">
        
        <h3>Articles:</h3>
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <div class="article">
                <input type="text" name="article[]" placeholder="Nom de l'article">
                <input type="number" name="quantity[]" placeholder="Quantité">
            </div>
        <?php } ?>
        
        <button type="submit" id="" class="btn">Créer</button>
        <button type="button" id="btnFermerCreer" class="btn">Fermer</button>
    </form>
</dialog>

    <?php 
     foreach($commands as $command){
        echo $command->id_commande, date("Y-m-d H:i:s");
    } ?>
</main>

<script>
    const Dialoguecreer = document.querySelector('#AddCommand');
    const ouvrirDialogueCreer = document.getElementById('btnCréer');
    const fermerBoutonDialogueCreer = document.getElementById('btnFermerCreer');

    ouvrirDialogueCreer.addEventListener('click', () => {
        Dialoguecreer.showModal();
  });
 
  fermerBoutonDialogueCreer.addEventListener('click', () => {
    Dialoguecreer.close();
  });

    </script>
<?php
include 'modeles/v_pied.php';

?>
