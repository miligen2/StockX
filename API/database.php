<?php
class Database
{
    private  $host = 'localhost';
    private  $bdd = 'StockX';
    private  $user = 'root';
    private  $mdp = '';
    private  $handler;
    private  $statement;
    private  $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->bdd;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->handler = new PDO($dsn, $this->user, $this->mdp, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
        echo $this->error;
    }


    public function query($sql){
        return $this->statement = $this->handler->prepare($sql);
    }

    public function bind($parameter, $value, $type = null){
        switch (is_null($type)){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute(){
        return $this->statement->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->statement->rowCount();
    }

    public function fetchColumn(){
        $this->execute();
        return $this->statement->fetchColumn();
    }
    public function lastInsertId() {
        return $this->handler->lastInsertId();
    }

 



    public function getLesStocksId(){
        $req = "SELECT id_stock FROM stocks ORDER BY id_stock";
        $res = $this->handler->query($req);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDetailCommande(){
        $req = "SELECT s.nom, dc.quantite AS quantite_dc, c.date_commande FROM details_commande dc INNER JOIN commandes c ON c.id_commande = dc.id_commande INNER JOIN stocks s ON s.id_stock = dc.id_stock;";
    }




}



?>
