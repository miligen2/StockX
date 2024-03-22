<?php

$db = new Database();

class Dashboard{
// indo stock
    public function getTotalstocks(){
        global $db;
        $req="SELECT SUM(quantite_disponible) FROM `stocks`;";  
        $db->query($req);
        return $db->fetchColumn();
        
    }
    public function getDateLastCommands(){
        global $db;
        $req="SELECT date_commande FROM commandes ORDER BY date_commande DESC LIMIT 1 ;";  
        $db->query($req);
        return $db->fetchColumn();
    }

    public function get3criticalsSTocks()
    {
        global $db;
        $req="SELECT nom,quantite_disponible FROM stocks WHERE quantite_disponible < 30 ORDER BY quantite_disponible  LIMIT 3;";
        $db->query($req);
        return $db->resultSet();
    }
    public function get3DernieresCommandes(){
        global $db;
        $req = "SELECT c.id_commande, c.date_commande, c.statut, c.entree_sortie, dc.quantite, s.nom 
            FROM commandes c 
            INNER JOIN details_commande dc ON c.id_commande = dc.id_commande 
            INNER JOIN stocks s ON dc.id_stock = s.id_stock  
            ORDER BY c.date_commande DESC 
            LIMIT 10;";
        $db->query($req);
        return $db->resultSet();

    }
    public function getCommandeEnAttente(){
        global $db;
        $req = 'SELECT COUNT(*) FROM commandes WHERE `statut` = "en_attente";';
        $db->query($req);
        return $db->fetchColumn();
    }
    public function getNombreDeCommandeRealise(){
        global $db;
        $req = 'SELECT COUNT(*) FROM commandes WHERE `statut` = "validee";';
        $db->query($req);
        return $db->fetchColumn();
    }

}


?>
