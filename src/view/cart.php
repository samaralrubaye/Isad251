
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<body>

<?php

session_start();
require_once('../model/requestItems.php');
require_once('../model/DbContext.php');


$db = new DbContext();

print_r('<hr><br><br>');
print_r('<pre>');
//var_dump($_SESSION);

$cart = $_SESSION['cart'];
$total_cost = 0;

foreach ($cart as $itemID => $item) {
 echo'<tr>';
    $product = $db->getProduct($itemID);
    $quantity = $item['stock'];

    if($product['stock'] < $quantity){
        echo "Sorry, we do not have $quantity items of ". $product['ProductName']. " in our Stock<br>";
        continue;
    }
    echo 'Item : '. $product['ProductName'] . ' Item Price: ' . $product['ProductCost'] . ' Quantity: '. $quantity. '<br>';
    $total_cost += $product['ProductCost'] * $quantity;

}


echo 'Total Cost : '. $total_cost;
echo '<hr>';
echo '<a href="checkout.php">Complete Order</a>';
?>


</body>
</html>

