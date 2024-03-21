<?php

include '../API/database.php';
include '../Controleur/commandes.php';
include '../Controleur/historique.php';


$id_commande = htmlspecialchars($_GET["id_commande"]);
$quantite = htmlspecialchars($_GET["quantite"]);
$nom_stock=htmlspecialchars($_GET["nom_stock"]);

$db = new Database();

$historiqueAcces = new Historique();

$commandAcces = new Commande();
$getCommande = $commandAcces->getCommandesById($id_commande);


if ($getCommande) 
{
    $commande_par = $getCommande->id_utilisateur;
    $commande_le = $getCommande->date_commande;
    $statut = $getCommande->statut;
}

$nomPrenomCommanderPar = $commandAcces->getNomById($commande_par);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['maj']) {  
    // recuperation status de la commande
    $majStatut = $_POST['statut'];

    // recuperation de l'id de l'item
    $idStock= $commandAcces->translateNomInId($nom_stock);

    //maj du statut
    $commandAcces->updateStatut($majStatut,$id_commande);

    if ($majStatut == "validee")
    {
        $commandAcces->updateStockIncrease($quantite,$idStock);
        header("location: v_listeCommande.php?titre=Historique");
    }
    header("location: v_listeCommande.php?titre=Historique");
}

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
    <?php include "modeles/v_titrePage.php" ?>
    <div class="container">
        <div class="contenue effet-carte">
            <h2>Mise à jour de la commande numero <?php echo $id_commande; ?></h2> <br><br>
            <form action="" method="post">
                <label>N° Commande</label>
                <input type="text" name="id_commande" value="<?php echo $id_commande; ?>" readonly>
                <label>Commandé par</label>
                <?php foreach ($nomPrenomCommanderPar as $np) { ?>
                <input type="text" value="<?php echo $np->prenom ." ".  $np->nom  ; ?>" readonly>
                <?php } ?>

                <label>Commandé le</label>
                <input type="text" value="<?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($commande_le))); ?>" readonly>
                <label>statut</label>
                <select name="statut">
                    <option value="validee" <?php if ($statut === 'validee') echo 'selected'; ?>>Validée</option>
                    <option value="en_attente" <?php if ($statut === 'en_attente') echo 'selected'; ?>>En attente</option>
                    <option value="invalidee" <?php if ($statut === 'invalidée') echo 'selected'; ?>>Invalidée</option>
                </select>
                <input type="submit" class="btn btn-success" name="maj" value="Mettre à jour" >
            </form>
        </div>


    </div>

</main>

<?php
include 'modeles/v_pied.php';
?>