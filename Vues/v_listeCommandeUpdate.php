<?php
include '../API/database.php';
include '../Controleur/commandes.php';

$db = new Database();
$commandAcces = new Commande();
$historiqueCommand = $commandAcces->getHistoriqueCommandes();

include 'modeles/v_entete.php';
include 'modeles/v_header.php';
?>

<?php
include 'modeles/v_pied.php';

?>