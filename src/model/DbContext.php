<?php


class DbContext
{

    private $db_server='proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser='ISAD251_SAlRubaye';
    private $dbPassword='ISAD251_22212855';
    private $dbDatabase='isad251_salrubaye';
    private $dataSourceName;
    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try {
            if ($this->connection == null) {
                $this->dataSourceName= "mysql:host=$this->db_server;dbname=$this->dbDatabase";
                $options=[
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES=>false
                ];
                $this->connection=new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword, $options);

            }
        } catch (PDOException $err) {
            echo 'Connection failed: ', $err->getMessage();
        }
    }

    public function Sp_insertCustomer($requestItem)
    {
        $sql="CALL Sp_insertCustomer  (:ItemID, :ProductCost, :ProductName,:Type,:desicription, :image)";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(':ItemID', $requestItem->ItemID(), PDO::PARAM_STR);
        $statement->bindParam(':ProductCost', $requestItem->ProductCost(), PDO::PARAM_STR);
        $statement->bindParam(':ProductName', $requestItem->ProductName(), PDO::PARAM_STR);
        $statement->bindParam(':Type', $requestItem->Type(), PDO::PARAM_STR);
        $statement->bindParam(':desicription', $requestItem->desicription(), PDO::PARAM_STR);
        $statement->bindParam(':image', $requestItem->image(), PDO::PARAM_STR);

        $return=$statement->execute();
        return $return;
    }


    public function spr_updateCustomer($request)
    {
        $sql="CALL spr_updateCustomer  (:UserID, :UserFirstName, :UserLastName,:UserEmail)";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(':UserID', $request->UserID(), PDO::PARAM_INT);
        $statement->bindParam(':UserFirstName', $request->UserFirstName(), PDO::PARAM_STR);
        $statement->bindParam(':UserLastName', $request->UserLastName(), PDO::PARAM_STR);
        $statement->bindParam(':UserEmail', $request->UserEmail(), PDO::PARAM_STR);
        $return=$statement->execute();
        return $return;
    }

    /**
     * @return PDO
     */
    public function getItems($requestItems)
    {
        $sql="call getItem(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID', $requestItems->ItemID(), PDO::PARAM_INT);
        $Statement->bindParam('ProductCost', $requestItems->ProductCost(), PDO::PARAM_INT);
        $Statement->bindParam('ProductName', $requestItems->ProductName(), PDO::PARAM_STR);
        $Statement->bindParam('Type', $requestItems->Type(), PDO::PARAM_STR);
        $Statement->bindParam('desicription', $requestItems->decicription(), PDO::PARAM_STR);
        $Statement->bindParam('image', $requestItems->image(), PDO::STR);
        $return=$requestItems->execute();
        return $return;
    }
    public function getCustomer ($requestCustomers)
    {
        $sql="call getCustomers(:UserID,:UserFirstName,:UserLastName,:UserEmail)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':UserID', $requestCustomers->UseID(), PDO::PARAM_INT);
        $Statement->bindParam('UserFirstName', $requestCustomers->UserFirstName(), PDO::PARAM_STR);
        $Statement->bindParam('UserLastName', $requestCustomers->UserLastName(), PDO::PARAM_STR);
        $Statement->bindParam('UserEmail', $requestCustomers->UserEmail(), PDO::PARAM_STR);

        $return=$requestCustomers->execute();
        return $return;
    }

    public function allProducts()
    {

        $query=$this->connection->prepare("call getItem()");
        $query->execute();

        return $query->fetchAll();
    }


    public function allCusromers()
    {
        $query=$this->connection->prepare("call getCustomers()");
        $query->execute();
        return $query->fetchAll();
    }

    public function getProduct($itemId)
    {
        $query = $this->connection->prepare("SELECT * FROM items WHERE ItemID = $itemId");
        $query->execute();

        return $query->fetch();
    }

    public function getCustomers($UserID)
    {
        $query = $this->connection->prepare("SELECT * FROM users WHERE UserID = $UserID");
        $query->execute();

        return $query->fetch();
    }
    public function addOrder($userId, $tableNo){

        $orderTime = date('Y-m-d H:i:s');

        $query = "INSERT INTO orders(TableNo, UserID, OrderTimeDate) VALUES(:TableNo, :UserId, :OrderTimeDate)";
        $stmt = $this->connection->prepare($query);
        $stmt -> bindParam(':TableNo', $tableNo);
        $stmt -> bindParam(':UserId', $userId);
        $stmt -> bindParam(':OrderTimeDate', $orderTime);
        $resutl = $stmt->execute();

        return $this->connection->lastInsertId();
    }

    public function addOrderDetails($quantity, $orderId, $itemId){
        $query = "INSERT INTO orderdetails(Quantity, OrderID, ItemID) VALUES(:Quantity, :OrderID, :ItemID)";
        $stmt = $this->connection->prepare($query);
        $stmt -> bindParam(':Quantity', $quantity);
        $stmt -> bindParam(':OrderID', $orderId);
        $stmt -> bindParam(':ItemID', $itemId);
        $resutl = $stmt->execute();
        return $resutl;
    }


    public function spr_updateitem($requestItems)
    {
        $sql="call spr_updateitem(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID', $requestItems->ItemID(), PDO::PARAM_INT);
        $Statement->bindParam('ProductCost', $requestItems->ProductCost(), PDO::PARAM_INT);
        $Statement->bindParam('ProductName', $requestItems->ProductName(), PDO::PARAM_STR);
        $Statement->bindParam('Type', $requestItems->Type(), PDO::PARAM_STR);
        $Statement->bindParam('desicription', $requestItems->decicription(), PDO::PARAM_STR);
        $Statement->bindParam('image', $requestItems->image(), PDO::STR);
        $return=$requestItems->execute();
        return $return;
    }

    public function sp_ItemDelete($requestItems)
    {
        $sql="call sp_ItemDelete(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID', $requestItems->ItemID(), PDO::PARAM_INT);
        $Statement->bindParam('ProductCost', $requestItems->ProductCost(), PDO::PARAM_decimal);
        $Statement->bindParam('ProductName', $requestItems->ProductName(), PDO::PARAM_STR);
        $Statement->bindParam('Type', $requestItems->Type(), PDO::PARAM_STR);
        $Statement->bindParam('desicription', $requestItems->decicription(), PDO::PARAM_STR);
        $Statement->bindParam('image', $requestItems->image(), PDO::STR);
        $return=$requestItems->execute();
        return $return;
    }

    public function Sp_insertItem($requestItems)
    {
        $sql="call Sp_insertItem(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID', $requestItems->ItemID(), PDO::PARAM_INT);
        $Statement->bindParam('ProductCost', $requestItems->ProductCost(), PDO::PARAM_decimal);
        $Statement->bindParam('ProductName', $requestItems->ProductName(), PDO::PARAM_STR);
        $Statement->bindParam('Type', $requestItems->Type(), PDO::PARAM_STR);
        $Statement->bindParam('desicription', $requestItems->decicription(), PDO::PARAM_STR);
        $Statement->bindParam('image', $requestItems->image(), PDO::STR);
        $return=$requestItems->execute();
        return $return;
    }


}