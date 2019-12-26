<?php


class DbContext
{

    private $db_server='proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser='ISAD251_SAlRubaye';
    private $dbPassword='ISAD251_22212855';
    private $dbDatabase='isad251_salrubaye';
    private $dataSourceName;
    private $connection;

    public function __construct(PDO $connection=null)
    {
        $this->connection=$connection;
        try {
            if ($this->connection === null) {
                $this->dataSourceName='mysqli:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection=new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
        } catch (PDOException $err) {
            echo 'Connection failed: ', $err->getMessage();
        }
    }

    public function Sp_insertCustomer($request)
    {
        $sql="CALL Sp_insertCustomer  (:Name, :Lname, :Uemail)";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(':Name', $request->Name(), PDO::PARAM_STR);
        $statement->bindParam(':Lname', $request->Room(), PDO::PARAM_STR);
        $statement->bindParam(':Uemail', $request->Row(), PDO::PARAM_STR);

        $return=$statement->execute();
        return $return;
    }


    public function spr_updateCustomer ($request)
    {
        $sql = "CALL spr_updateCustomer  (:Name, :Lname, :Uemail)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':Name', $request->Name(), PDO::PARAM_STR);
        $statement->bindParam(':Lname', $request->Room(), PDO::PARAM_STR);
        $statement->bindParam(':Uemail', $request->Row(), PDO::PARAM_STR);

        $return = $statement->execute();
        return $return;
    }
    /**
     * @return PDO
     */
    public function getItems($requestItems)
    {
        $sql="call getItem(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID',$requestItems->ItemID(),PDO::PARAM_INT);
        $Statement->bindParam('ProductCost',$requestItems->ProductCost(),PDO::PARAM_INT);
        $Statement->bindParam('ProductName',$requestItems->ProductName(),PDO::PARAM_STR);
        $Statement->bindParam('Type',$requestItems-> Type(),PDO::PARAM_STR);
        $Statement->bindParam('desicription',$requestItems->decicription(),PDO::PARAM_STR);
        $Statement->bindParam('image',$requestItems->image(),PDO::STR);
        $return = $requestItems->execute();
        return $return;
    }

    public function spr_updateitem($requestItems)
    {
        $sql="call spr_updateitem(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID',$requestItems->ItemID(),PDO::PARAM_INT);
        $Statement->bindParam('ProductCost',$requestItems->ProductCost(),PDO::PARAM_INT);
        $Statement->bindParam('ProductName',$requestItems->ProductName(),PDO::PARAM_STR);
        $Statement->bindParam('Type',$requestItems->Type(),PDO::PARAM_STR);
        $Statement->bindParam('desicription',$requestItems->decicription(),PDO::PARAM_STR);
        $Statement->bindParam('image',$requestItems->image(),PDO::STR);
        $return = $requestItems->execute();
        return $return;
    }

    public function sp_ItemDelete($requestItems)
    {
        $sql="call sp_ItemDelete(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID',$requestItems->ItemID(),PDO::PARAM_INT);
        $Statement->bindParam('ProductCost',$requestItems->ProductCost(),PDO::PARAM_decimal);
        $Statement->bindParam('ProductName',$requestItems->ProductName(),PDO::PARAM_STR);
        $Statement->bindParam('Type',$requestItems->Type(),PDO::PARAM_STR);
        $Statement->bindParam('desicription',$requestItems->decicription(),PDO::PARAM_STR);
        $Statement->bindParam('image',$requestItems->image(),PDO::STR);
        $return = $requestItems->execute();
        return $return;
    }

    public function Sp_insertItem($requestItems)
    {
        $sql="call Sp_insertItem(:ItemID,:ProductCost,:ProductName,:Type,:Destination,:image,:Stock)";
        $Statement=$this->connection->prepare($sql);
        $Statement->bindParam(':ItemID',$requestItems->ItemID(),PDO::PARAM_INT);
        $Statement->bindParam('ProductCost',$requestItems->ProductCost(),PDO::PARAM_decimal);
        $Statement->bindParam('ProductName',$requestItems->ProductName(),PDO::PARAM_STR);
        $Statement->bindParam('Type',$requestItems->Type(),PDO::PARAM_STR);
        $Statement->bindParam('desicription',$requestItems->decicription(),PDO::PARAM_STR);
        $Statement->bindParam('image',$requestItems->image(),PDO::STR);
        $return = $requestItems->execute();
        return $return;
    }



}