<?php

$db = new Database();

class Commande{
    public function getCommandes(){
        global $db;
        $req ="SELECT * FROM commandes ORDER BY date_commande;";
        $db->query($req);
        return $db->resultSet();
    }
    public function getCommandesById($id_commande)
    {
        global $db;
        $req ="SELECT * FROM commandes WHERE id_commande = :id_commande";
        $db->query($req);
        $db->bind(':id_commande', $id_commande);
       return $db->single();
    }
    public function getNomById($id_user)
    {
        global $db;
        $req ="SELECT nom, prenom FROM utilisateurs WHERE id_utilisateur = :id_user";
        $db->query($req);
        $db->bind(':id_user', $id_user);
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
    public function updateStatut($statut,$id_commande)
    {
        try {
        global $db;
        $req ="UPDATE commandes SET statut= :statut WHERE id_commande = :id_commande";
        $db->query($req);
        $db->bind(':id_commande', $id_commande);
        $db->bind(':statut', $statut);
       return $db->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        
        }
    }
    
    public function getHistoriqueCommandes() {
        global $db;
        $req = "SELECT c.id_commande, c.date_commande, c.statut, dc.id_stock, dc.quantite, s.nom AS nom_stock
                FROM commandes c
                INNER JOIN details_commande dc ON c.id_commande = dc.id_commande
                INNER JOIN stocks s ON dc.id_stock = s.id_stock
                ORDER BY c.date_commande DESC";
        $db->query($req);
        return $db->resultSet();
    }


    public function translateNomInId($nom)
    {
        global $db;
        $req ="SELECT id_stock FROM stocks WHERE nom = :nom";
        $db->query($req);
        $db->bind(':nom', $nom);
        return $db->fetchColumn();
    }


    public function updateStockIncrease($quantite,$id_stock)
    {
        global $db;
        $req = "UPDATE stocks SET quantite_disponible = quantite_disponible + :quantite WHERE id_stock = :id_stock";
        $db->query($req);
        $db->bind(':quantite', $quantite);
        $db->bind(':id_stock', $id_stock);
        return $db->execute();
    }




    
    

 }
?>
