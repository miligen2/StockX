<?php

$db = new Database();

 class Commande{
    public function getCommandes(){
        global $db;
        $req ="SELECT * FROM commandes ORDER BY date_commande;";
        $db->query($req);
        return $db->resultSet();
    }

    public function creatCommande($id_user) {
        global $db;
        $datecommande = date("Y-m-d H:i:s");
    
        $req = "INSERT INTO commandes (id_utilisateur, date_commande, statut) VALUES (:id_user, :datecommande, 'en_attente')";
        $db->query($req);
        $db->bind(':id_user', $id_user);
        $db->bind(':datecommande', $datecommande);
        $db->execute();
    
        return $db->lastInsertId();
    

    }
    public function creatCommande2($lastId,$quantite,$id_stock){   
        global $db;
        try{
            $error = false;
         
            $req2 = "INSERT INTO details_commande (id_commande, id_stock, quantite) VALUES (:id_command, :id_stock, :quantite)";
            $db->query($req2);
            $db->bind(':id_command', $lastId);
            $db->bind(':id_stock', $id_stock);
            $db->bind(':quantite', $quantite);
            $db->execute();
        }catch (Exception $e) {
            echo $e->getMessage();
            $error = true;
        }
        return $error;

    }
    
    

 }
?>
