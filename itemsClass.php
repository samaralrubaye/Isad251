<?php
class items{
 
    // database connection and table name
    private $dbconn;
    private $table_name = "items";
 
    // object properties
    public $ItemID;
    public $ProductName;
    public $description;
    public $productCost;
    public $stock;
	public $type;
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->dbconn = $db;
    }
}
?>