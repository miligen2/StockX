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





}


?>
