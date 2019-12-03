<?php
include_once("cafe.css ");
include_once("header.php");
require_once("config.php");
#create pdo query
$pdo->setatribute(pdo::ATTR_DEFAULT_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

#$stmt=pdo->quer('select*from items');
#while($row=$stmt->fetch(pdo::FETCH_ASSOC)){
	#ECHO $row['ItemID'].'<br>';

var_dump(quer);
$STATMENT=$pdo->prepare($quer);
$STATMENT->execute();
$r =$STATMENT->fetchAll(pdo::FETCH_ASSOC);
foreach($r as $row){

#$stmt=pdo->quer('select*from items');
#while($row=$stmt-fetch(pdo::FETCH_ASSOC)){
	#ECHO $row['ItemID'].'<br>';
	
}
?>