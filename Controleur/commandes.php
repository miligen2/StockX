<?php

$db = new Database();

 class Commande{
    public function getCommandes(){
        global $db;
        $req ="SELECT * FROM commandes ORDER BY date_commande;";
        $db->query($req);
        return $db->resultSet();
    }
 }
?>
