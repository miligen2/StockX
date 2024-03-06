<?php

$db = new Database();

class Historique(){

    public function updateStockIncrease($valeur,$idStock) 
    {
        try
        {
            global $db;
            $req = "UPDATE stocks SET quantite_disponible = quantite_disponible + :valeur WHERE id_stock = :idStock "
            $db->bind(':idStock',$idStock);
            $db->bind(':valeur',$valeur);
            $db->execute();
        }catch(PDOException $e){
            echo "Error updating stock quantity" 
            echo $e->getMessage();
        }
    }
    
    public function updateStockDecrease($valeur,$idStock) 
    {
        try
        {
            global $db;
            $req = "UPDATE stocks SET quantite_disponible = quantite_disponible - :valeur WHERE id_stock = :idStock "
            $db->bind(':idStock',$idStock);
            $db->bind(':valeur',$valeur);
            $db->execute();
        }catch(PDOException $e){
            echo "Error updating stock quantity" 
            echo $e->getMessage();
        }




    }


}





?>