<?php


class requestItems
{
private $ItemID;
private $ProductCost;
private $ProductName;
private $Type;
Private $description;
private $image;
private $stock;
    public function __construct( $ItemID,$ProductCost,$ProductName, $Type, $description,$image,$stock){
       $this->ItemID=$ItemID;
       $this->ProductCost=$ProductCost;
       $this->ProductName=$ProductName;
       $this->Type=$Type;
       $this->description=$description;
       $this->image=$image;
       $this->stock=$stock;
        }

    public function ItemID(){
        return $this->ItemID;
    }
    public function ProductCost(){
        return $this->ProductCost;

    }
    public function ProductName(){
        return $this->ProductName;
    }
    public function  Type(){
        return $this->Type;
    }
    public function description (){
        return $this->description;

    }
    public function image(){
        return $this->image;
    }
    public  function stock(){
        return $this->stock;
    }



}