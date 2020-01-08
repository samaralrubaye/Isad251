<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once("../src/model/DbContext.php");
include_once("../src/model/requestItems.php");

$db = new DbContext();
$products = $db->allProducts();
$array = array();
foreach($products as $row)
{
    $productArray = [
        'name' => $row['ProductName'],
        'cost' => $row['ProductCost'],
        'type' => $row['Type'],
        'desicription' => $row['desicription'],

    ];
    array_push($array, $productArray);
}
echo json_encode($array);





?>
