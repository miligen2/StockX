<?php
include '../API/database.php';
include '../Controleur/commandes.php';

$db = new Database();
$commandAcces = new Commande();
$historiqueCommand = $commandAcces->getHistoriqueCommandes();

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>
<main>
    <?php include "modeles/v_titrePage.php" ?>
    <div class="container">
        <div class="contenue effet-carte">
            <h2>Historique des commandes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Numéro de commande</th>
                        <th>Date de commande</th>
                        <th>Statut</th>
                        <th>Stock</th>
                        <th>Quantité</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historiqueCommand as $command) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($command->id_commande); ?></td>
                            <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($command->date_commande))); ?></td>
                            <td class="<?php echo $command->statut == 'en_attente' ? 'en-attente' : ($command->statut == 'validee' ? 'validee' : ($command->statut == 'invalidee' ? 'invalidee' : '')); ?>">
                                <?php echo htmlspecialchars($command->statut); ?>
                            </td>
                            <td><?php echo htmlspecialchars($command->nom_stock); ?></td>
                            <td><?php echo htmlspecialchars($command->quantite); ?></td>
                            <td><a href="./v_listeCommandeUpdate.php?id_commande=<?php echo $command->id_commande?>">VA NIQUER TES MORTS</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
include 'modeles/v_pied.php';

?>
