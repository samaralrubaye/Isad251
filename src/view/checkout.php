<?php

session_start();
include_once ('../model/DbContext.php');
include_once ('../model/requestItems.php');

$page_title='Ceckout';

$db = new DbContext();
$userId = 3;
$tableNo = 4;

if(!array_key_exists('cart', $_SESSION)){
    die("You don't have any items in the cart");
}
$cart = $_SESSION['cart'];

$orderId = $db->addOrder($userId, $tableNo);

foreach ($cart as $itemID => $item) {

    $product = $db->getProduct($itemID);
    $quantity = $item['stock'];

    if($product['stock'] < $quantity){
        echo "Sorry, we do not have $quantity items of ". $product['ProductName']. " in our Stock<br>";
        continue;
    }
    $db->addOrderDetails($quantity, $orderId, $itemID);

}

//Show successfull message
//clear the cart

echo 'Thank you for adding the order';
session_destroy();



?>