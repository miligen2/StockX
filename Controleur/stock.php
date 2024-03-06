<?php

$db = new Database();


class Stock{

    public function getLesStocks(){
        global $db;
        $req = "SELECT id_stock, nom, description, quantite_disponible, type FROM stocks ORDER BY nom";
        $db->query($req);
        return $db->resultSet();
    }
    public function getLesStocksById($id)
    {
        global $db;
        try {
        $req = "SELECT * FROM stocks WHERE id_stock= :id_stock;";
        $db->query($req);
        $db->bind(':id_stock',$id);
        return $db->resultSet();
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function createStock($nom, $description, $qt_disp, $type) {
        global $db;
        try{
        $error = false;
        $req = "INSERT INTO stocks (nom, description, quantite_disponible, type) VALUES (:nom, :description, :qt_disp, :type);";
        $db->query($req);
        $db->bind(':nom', $nom);
        $db->bind(':description', $description);
        $db->bind(':qt_disp', $qt_disp);
        $db->bind(':type', $type);
        $db->execute();
        }catch (Exception $e) {
            echo $e->getMessage();
            $error = true;
        }
        return $error;
        
    }
    public function updateStock($id, $nom, $description, $qt_disp, $type) {
        global $db;
        try{
            $req = "UPDATE stocks SET nom = :nom, description = :description , quantite_disponible = :qt_disp, type = :type   WHERE id_stock = :id_stock;";
            $db->query($req);
            $db->bind(':nom', $nom);
            $db->bind(':description', $description);
            $db->bind(':qt_disp', $qt_disp);
            $db->bind(':type', $type);
            $db->bind(':id_stock', $id);
            $db->execute();
        }catch (PDOException $e)
            {
                echo $e->getMessage();
            }
    }

    public function deleteStock($id) {
        global $db;
        try {
            $req = "DELETE FROM stocks WHERE id_stock = :id";
            $db->query($req);
            $db->bind(':id', $id);
            $db->execute();
        }
        catch (Exception $e){
            echo $e->getMessage();
            
        }
    }
}
?>
