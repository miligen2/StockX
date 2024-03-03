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
    public function get3criticalsSTocks()
    {
        global $db;
        $req="SELECT nom,quantite_disponible FROM stocks WHERE quantite_disponible < 30 ORDER BY quantite_disponible  LIMIT 3;";
        $db->query($req);
        return $db->resultSet();
    }
}


?>
